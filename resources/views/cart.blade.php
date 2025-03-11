@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    @php
        $cart = session('cart', []);
        $total = 0;
        $subtotal = 0;
    @endphp


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
                    <h3 class="section__titile">Calculate Shipping</h3>

                    <form action="" class="form grid">
                        <input type="text" placeholder="State / Country" class="form__input">

                        <div class="form__group grid">
                        <input type="text" placeholder="City" class="form__input">

                        <input type="text" placeholder="Postcode/ ZIP" class="form__input">
                        </div>

                        <div class="form_btn">
                            <button class="btn flex btn--sm">
                                <i class="ri-shuffle-line"></i> Update
                            </button>
                        </div>
                    </form>
                </div>

                <div class="cart__coupon">
                    <h3 class="section__title">Apply Coupon</h3>

                    <form action="" class="coupon__form grid">
                        <div class="form__group grid">
                            <input type="text" class="form__input"  placeholder="Enter Your Coupon"/>

                            <div class="form__btn">
                            <button class="btn flex btn--sm">
                            <i class="ri-price-tag-line"></i> Apply
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="cart__total">
                <h3 class="section__title">Cart Totals</h3>

                <table class="cart__total-table">
                    <tr>
                        <td><span class="cart__total-title">Cart Subtotal</span></td>
                        <td><span class="cart__total-price">NGN{{ number_format($subtotal, 2) }}</span></td>
                    </tr>

                    <tr>
                        <td><span class="cart__total-title">Shipping</span></td>
                        <td><span class="cart__total-price">NGN 0</span></td>
                    </tr>

                    <tr>
                        <td><span class="cart__total-title">Total</span></td>
                        <td><span class="cart__total-price">NGN{{ number_format($subtotal, 2) }}</span></td>
                    </tr>
                </table>

                <a href="{{ route('place-order') }}" class="btn flex btn--md">
                    <i class="ri-shopping-cart-line"></i></i> Proceed To checkout
                </a>
            </div>
        </div>
    </section>
    @endsection
