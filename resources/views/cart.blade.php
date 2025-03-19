@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <section class="breadcrumb">
        <ul class="breadcrumb__list flex-1 container">
            <li><a href="" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Shop</span></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Cart</span></li>
        </ul>
    </section>

    <!-- CART -->
    <section class="cart section--lg container">
        <div class="table__container">
        @if(count($cart) > 0)

            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
                @foreach($cart as $productId => $item)
                    @php
                        $lineTotal = $item['price'] * $item['quantity'];
                        $subtotal += $lineTotal;
                    @endphp

                    <tr class="cart-item" data-id="{{ $productId }}">
                        <td>
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="table__img">
                        </td>

                        <td>
                            <h3 class="table__title">{{ $item['name'] }}</h3>
                            <p class="table__description">
                            {{ $item['description'] ?? 'No description available' }}
                            </p>
                        </td>

                        <td hidden><span class="table__price" id="price">{{$item['price']}}</span></td>
                        <td><span class="table__price">NGN{{ number_format($item['price'], 2) }}</span></td>

                        <td>
                            <div>
                                <span id="decrease" class="cartbtn" data-id="{{ $productId }}">-</span>
                                <span id="quantity" class="cartprice">{{ $item['quantity'] }}</span>
                                <span id="increase" class="cartbtn" data-id="{{ $productId }}">+</span>
                            </div>
                        </td>

                        <td><span class="table__subtotal" id="subtotal">NGN{{ number_format($item['price'] * $item['quantity'], 2) }}</span></td>

                        <td>
                            <button type="submit" id="remove-from-cart" data-id="{{ $productId }}">
                            <i class="ri-delete-bin-line table__trash" style="color: red;"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </table>
            @else
            <p>Your cart is empty.</p>
        @endif
        </div>

        <div class="cart__actions">
            <a href="{{ route('shop') }}" class="btn flex btn--md">
                <i class="ri-shopping-bag-line"></i> Continue Shopping
            </a>
        </div>

        <div class="divider">
        <i class="ri-fingerprint-line"></i>
        </div>


        <div class="cart__group grid">

            <div>
                <div class="cart__shipping">
                    <h3 class="section__titile">Add a Shipping Location</h3>

                    <div style="margin-top: .5rem;">
                        <button class="btn flex btn--sm" id="openModal">
                            <i class="ri-shuffle-line"></i> View Locations
                        </button>
                    </div>

                </div>

                <!-- Selected Delivery Info -->
                <div id="selectedLocation" class="hidden checkout_total">
                    <div class="flex-4">
                        <h4>Location</h4>
                        <p id="locationName"></p>
                    </div>
                    <div class="flex-4">
                        <h4>Price</h4>
                        <p id="locationPrice"></p>
                    </div>
                    <div class="flex-4">
                        <p><strong>Axis:</strong> <span id="locationAxis"></span></p>
                    </div>
                </div>

                <!-- Modal -->
                <div id="locationModal" class="modal">
                    <div class="modal-content">
                        <span class="close-btn" id="closeModal">&times;</span>
                        <h3>Delivery Locations</h3>
                        <div id="locationsList">
                            <p>Loading locations...</p>
                        </div>
                    </div>
                </div>

                @if($coupon)

                    <div class="cart__coupon">
                        <h3 class="section__title">Remove Coupon</h3>

                        <form action="{{ route('remove.coupon') }}" method="post" class="coupon__form grid">
                            @csrf
                            <div class="form__group grid">
                                <input type="text" class="form__input" name="coupon" placeholder="Enter Your Coupon" value="{{ $coupon->code }}" readonly/>

                                <div class="form__btn">
                                <button class="btn flex btn--sm delete">
                                <i class="ri-price-tag-line"></i> Remove
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>

                @else

                    <div class="cart__coupon">
                        <h3 class="section__title">Apply Coupon</h3>

                        <form action="{{ route('apply.coupon') }}" method="post" class="coupon__form grid">
                            @csrf
                            <div class="form__group grid">
                                <input type="text" class="form__input" name="coupon" placeholder="Enter Your Coupon" required/>

                                <div class="form__btn">
                                <button class="btn flex btn--sm">
                                <i class="ri-price-tag-line"></i> Apply
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>

                @endif

            </div>

            <div class="cart__total">
                <h3 class="section__title">Cart Totals</h3>

                <table class="cart__total-table">
                    <tr>
                        <td><span class="cart__total-title">Cart Subtotal</span></td>
                        <td><span class="cart__total-price" id="carts-total">NGN {{ number_format($subtotal, 2) }}</span></td>
                    </tr>

                    <tr>
                        <td><span class="cart__total-title">Shipping</span></td>
                        <td><span class="cart__total-price">NGN </span><span class="cart__total-price" id="shipping">{{ number_format($shipping, 2) }}</span></td>
                    </tr>

                    {{-- <tr>
                        <td><span class="cart__total-title">Total</span></td>
                        <td><span class="cart__total-price">NGN{{ number_format($subtotal, 2) }}</span></td>
                    </tr> --}}
                </table>

                <p id="notice">Please select a shipping location to proceed to checkout</p>

                <button class="btn flex btn--md hidden" id="proceedToCheckout">
                    <i class="ri-shopping-cart-line"></i></i> Proceed To checkout
                </button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById("locationModal");
            const openModal = document.getElementById("openModal");
            const closeModal = document.getElementById("closeModal");
            const locationsList = document.getElementById("locationsList");
            const selectedLocationDiv = document.getElementById("selectedLocation");
            const locationName = document.getElementById("locationName");
            const locationPrice = document.getElementById("locationPrice");
            const locationAxis = document.getElementById("locationAxis");
            const proceedButton = document.getElementById("proceedToCheckout");
            const shipping = document.getElementById("shipping");
            const notice = document.getElementById("notice");

            // Open modal
            openModal.addEventListener("click", function () {
                modal.style.display = "block";
                fetchLocations();
            });

            // Close modal
            closeModal.addEventListener("click", function () {
                modal.style.display = "none";
            });

            // Fetch delivery locations from Laravel backend
            function fetchLocations() {
                fetch("{{ url('/api/delivery-locations') }}")
                    .then(response => response.json())
                    .then(data => {
                        locationsList.innerHTML = ""; // Clear previous data
                        data.forEach(location => {
                            let div = document.createElement("div");
                            div.classList.add("delivery-item");
                            div.dataset.id = location.id;
                            div.dataset.name = location.name;
                            div.dataset.price = location.price;
                            div.innerHTML = `
                                <strong>${location.name}</strong> - NGN ${location.price}
                                <p>${location.description}</p>
                            `;
                            div.addEventListener("click", () => selectLocation(location));
                            locationsList.appendChild(div);
                        });
                    })
                    .catch(error => {
                        locationsList.innerHTML = "<p>Error loading locations.</p>";
                    });
            }

            // Select a location
            function selectLocation(location) {
                locationName.textContent = location.name;
                locationPrice.textContent = location.price;
                locationAxis.textContent = location.description;
                shipping.textContent = location.price;

                // Show selected location
                selectedLocationDiv.classList.remove("hidden");
                proceedButton.classList.remove("hidden");

                // hide notice
                notice.style.display = "none";

                // Close modal
                modal.style.display = "none";
            }

            // Proceed to checkout - Save in session
            proceedButton.addEventListener("click", function () {
                const locationId = document.querySelector(".delivery-item[data-name='" + locationName.textContent + "']").dataset.id;
                fetch("{{ url('/api/save-location') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" // CSRF Token for security
                    },
                    body: JSON.stringify({ location_id: locationId })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    window.location.href="/checkout";
                })
                .catch(error => {
                    alert("Error saving location.");
                });
            });

            // Close modal if clicked outside
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        });
    </script>

    @endsection
