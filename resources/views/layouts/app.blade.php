@php
    $cart = session('cart', []);
    $totalProducts = count($cart);
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="content">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="" type="image/png" sizes="160x160">
        <link rel="stylesheet" href="{{ asset ('css/style.css')}}">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontisto/3.0.4/css/fontisto.min.css">


        {{-- fontawesome kit --}}
        <script src="https://kit.fontawesome.com/23bcbedea7.js" crossorigin="anonymous"></script>
        <title>E Commerce Website || @yield('title')</title>
    </head>
    <body>
        <div>
            @foreach ($errors->all() as $message)
                <div id="notification" class="page-notification stat-2 failed">
                    <p>{{ $message }}</p>
                </div>
            @endforeach

            @if (session('success'))
                <div id="notification" class="page-notification show stat-2 success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div id="notification" class="page-notification stat-2 failed">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </div>

        <div id="cart-notification" class="cart-notification"></div>

        <header class="header user">
            <div class="header__top">
                <div class="header__container container">
                    <div class="header__contact">
                        <span> +1 (757) 648-9243 </span>
                        <span>Our Location</span>
                    </div>
                    <p class="header__alert-news">
                        Super Value Deals - Save more with coupons
                    </p>
                     @if(auth()->check())
                        <!-- User is logged in -->
                        <a href="{{ route('account') }}" class="header__top-action"><i class="ri-user-line" style="font-size: 20px;"></i></a>
                    @else
                        <!-- User is not logged in -->
                        <a href="{{ route('login') }}" class="header__top-action">Login / Sign up</a>
                    @endif

                </div>
            </div>

            <nav class="nav container white">
            <div class="header__action-btn  nav__toggle" id="nav-toggle">
                        <img src="{{ asset('assets/menu-burger.svg') }}" alt="">
                    </div>
                <a href="" class="nav__logo">
                    <img src="{{ asset('assets/T&T logo.png') }}" alt="" class="nav__logo-img">
                </a>
                <div class="nav__menu" id="nav-menu">
                    <div class="nav__menu-top">
                        <a href="" class="nav__menu-logo">
                            <img src="{{ asset('assets/T&T logo.png') }}" alt="">
                        </a>

                        <div class="nav__close" id="nav-close">
                            <i class="ri-close-line"></i>
                        </div>
                    </div>
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="{{ route('index') }}" class="nav__link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="{{ route('shop') }}" class="nav__link">Shop</a>
                        </li>

                        <li class="nav__item">
                            <a href="" class="nav__link">Compare</a>
                        </li>

                        <li class="nav__item">
                        @if(auth()->check())
                        <!-- User is logged in -->
                        <a href="{{ route('account') }}" class="nav__link">My Account</a>
                    @else
                        <!-- User is not logged in -->
                        <a href="{{ route('login') }}" class="nav__link">Login / Sign up</a>
                    @endif
                        </li>
                    </ul>

                    <div class="header__search">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <input type="text" name="search" placeholder="Search for Items" class="form__input">
                            <button class="search__btn" type="submit">
                                <img src=" {{ asset('assets/search.png') }} " alt="">
                            </button>
                        </form>
                    </div>
                </div>

                <div class="header__user-actions">
                    <a href="{{ route('wishlist.index') }}" class="header__action-btn">
                        <img src="{{ asset('assets/icon-heart.svg') }}" alt="">
                        <span class="count" id="wishlist-count">{{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}</span>
                    </a>

                    <a href="/cart" class="header__action-btn">
                        <img src="{{ asset('assets/icon-cart.svg') }}" alt="">
                        <span class="count" id="cart-count">0</span>
                    </a>
                    @if(auth()->check())
                        <a href="{{ route('account') }}" class="header__action-btn two">
                            <img src="{{ asset('assets/icon-user.png') }}" alt="">
                        </a>
                    @else
                    <a href="{{ route('login') }}" class="header__action-btn two">
                        <img src="{{ asset('assets/icon-user.png') }}" alt="">
                    </a>
                    @endif

                </div>
            </nav>
        </header>

        <main class="main">

            @yield('content')

            <section class="newsletter section home__newsletter">
                <div class="newsletter__container container grid">
                    <h3 class="newsletter__title flex">
                        <img src="{{ asset('assets/icon-email.svg') }}" class="newsletter__icon" alt="">
                        Sign up to Newsletter
                    </h3>
                    <p class="newsletter__description">
                        ... and receive $25 coupon for shopping
                    </p>
                    <form action="" class="newsletter__form">
                        <input
                            type="text"
                            placeholder="Enter your email"
                            class="newsletter__input"
                        >
                        <button type="submit" class="newsletter__btn">Subscribe</button>
                    </form>
                </div>
            </section>

            <footer class="footer container">
                <div class="footer__container grid">

                    <div class="footer__content">
                        <a href="" class="footer__logo">
                            <img src="{{ asset('assets/T&T logo.png') }}" alt="" class="footer__logo-img">
                        </a>
                        <h4 class="footer__subtitle">Contact</h4>

                        <p class="footer__description">
                            <span>Address: </span> 811 Admissions Court Virginia Beach VA 23462 USA
                        </p>

                        <p class="footer__description">
                            <span>Phone: </span> +1 (757) 648-9243
                        </p>

                        <p class="footer__description">
                            <span>Hours: </span> 10:00 - 18:00 Mon - Sat
                        </p>

                        <div class="footer__social">

                            <h4 class="footer__subtitle">Follow Us</h4>

                            <div class="footer__social-links flex-1">

                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-facebook.svg') }}" alt="" class="footer__social-icon">
                                </a>

                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-twitter.svg') }}" alt="" class="footer__social-icon">
                                </a>

                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-instagram.svg') }}" alt="" class="footer__social-icon">
                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Address</h3>
                        <ul class="footer__links">
                            <li> <a href="" class="footer__link">About Us</a> </li>
                            <li> <a href="" class="footer__link">Delivery Information</a> </li>
                            <li> <a href="" class="footer__link">Privacy Policy</a> </li>
                            <li> <a href="" class="footer__link">Terms & Conditions</a> </li>
                            <li> <a href="" class="footer__link">Contact Us</a> </li>
                            <li> <a href="" class="footer__link">Support Center</a> </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">My Account</h3>
                        <ul class="footer__links">
                            <li> <a href="" class="footer__link">Sign In</a> </li>
                            <li> <a href="" class="footer__link">View Cart</a> </li>
                            <li> <a href="" class="footer__link">My Wishlist</a> </li>
                            <li> <a href="" class="footer__link">Track My Order</a> </li>
                            <li> <a href="" class="footer__link">Help</a> </li>
                            <li> <a href="" class="footer__link">Order</a> </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Secure Payments Gateways</h3>
                        <img src="{{ asset('assets/payment-method.png') }}" alt="" class="payment__img">
                    </div>

                </div>

                <div class="footer__bottom">
                    <p class="copyright">&copy; 2023 T&T Africa. All Rights Reserved</p>
                    <span class="designer">Designed by Developers</span>
                </div>
            </footer>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src=" {{ asset('js/script.js') }} "></script>

        <script>
            document.querySelectorAll(".add__btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    let product = {
                        id: this.dataset.id,
                    };
                    addToCart(product);
                });
            });

            function showNotification(message) {
                let notification = document.getElementById("cart-notification");
                notification.innerText = message;
                notification.classList.add("show");

                setTimeout(() => {
                    notification.classList.remove("show");
                }, 3000); // Hide after 3 seconds
            }

            function updateCartCount() {
                fetch("{{ route('cart.count') }}")
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('cart-count').innerText = data.cartCount;
                    });
            }

            function updateCartTotal() {
                fetch("{{ route('cart.total') }}")
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('carts-total').innerText = data.total;
                    });
            }

            function addToCart(product) {
                fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ product })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    updateCartCount();
                });
            }

            document.querySelectorAll("#remove-from-cart").forEach(button => {
                button.addEventListener("click", function () {
                    let productId = this.dataset.id;
                    removeFromCart(productId);
                });
            });

            function removeFromCart(id) {
                fetch("{{ route('cart.remove') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ id })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    updateCartCount();

                    // Remove item from the DOM
                    let cartItem = document.querySelector(`.cart-item[data-id="${id}"]`);
                    if (cartItem) {
                        cartItem.remove();
                    }
                });
            }


            document.querySelectorAll("#increase").forEach(button => {
                button.addEventListener("click", function () {
                    let cartItem = this.closest(".cart-item");
                    let productId = this.dataset.id;
                    let quantitySpan = cartItem.querySelector("#quantity");
                    let subtotalSpan = cartItem.querySelector("#subtotal");
                    let price = parseFloat(cartItem.querySelector("#price").innerText);

                    let quantity = parseInt(quantitySpan.innerText);
                    quantity++;
                    quantitySpan.innerText = quantity;

                    // Update subtotal
                    let newSubtotal = (quantity * price).toFixed(2);
                    subtotalSpan.innerText = newSubtotal;

                    updateCart(productId, quantity); // Send update to backend
                    updateCartTotal();
                });
            });

            document.querySelectorAll("#decrease").forEach(button => {
                button.addEventListener("click", function () {
                    let cartItem = this.closest(".cart-item");
                    let productId = this.dataset.id;
                    let quantitySpan = cartItem.querySelector("#quantity");
                    let subtotalSpan = cartItem.querySelector("#subtotal");
                    let price = parseFloat(cartItem.querySelector("#price").innerText);

                    let quantity = parseInt(quantitySpan.innerText);
                    if (quantity > 1) {  // Prevent going below 1
                        quantity--;
                        quantitySpan.innerText = quantity;

                        // Update subtotal
                        let newSubtotal = (quantity * price).toFixed(2);
                        subtotalSpan.innerText = newSubtotal;

                        updateCart(productId, quantity); // Send update to backend
                        updateCartTotal();
                    }
                });
            });

            // Function to update cart in the backend
            function updateCart(id, quantity) {

                fetch("{{ route('cart.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ id, quantity })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    updateCartCount(); // Refresh cart count if needed
                });
            }

            // Ensure the cart count is updated when the page loads
            document.addEventListener("DOMContentLoaded", updateCartCount);

            document.querySelectorAll(".wishlist__btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    let product = {
                        id: this.dataset.id,
                    };
                    addToWishlist(product);
                });
            });

            function showNotification(message) {
                let notification = document.getElementById("cart-notification");
                notification.innerText = message;
                notification.classList.add("show");

                setTimeout(() => {
                    notification.classList.remove("show");
                }, 3000); // Hide after 3 seconds
            }

            function updateWishlistCount() {
                fetch("{{ route('wishlist.count') }}")
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('wishlist-count').innerText = data.wishlistCount;
                    });
            }

            function addToWishlist(product) {
                fetch("{{ route('wishlist.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ product_id: product.id })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    updateWishlistCount();
                })
                .catch(error => {
                    console.error('Error adding product to wishlist:', error);
                    alert('Error adding product to wishlist: ' + error.message);
                });
            }

            document.querySelectorAll("#remove-wishlist-btn").forEach(button => {
                button.addEventListener("click", function () {
                    let productId = this.dataset.id;
                    removeFromWishlist(productId);
                });
            });

            function removeFromWishlist(id) {
                fetch("{{ route('wishlist.remove') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ id })
                })
                .then(response => response.json())
                .then(data => {
                    showNotification(data.message);
                    updateWishlistCount(data.count);

                    // Remove item from the DOM
                    let wishlistItem = document.querySelector(`.wishlist-item[data-id="${id}"]`);
                    if (wishlistItem) {
                        wishlistItem.remove();
                    }
                });
            }
        </script>

        <script>
            document.getElementById("edit-address-btn").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("address-form").classList.toggle("show-form");
            });
        </script>

    </body>
</html>
