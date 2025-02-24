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
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><input type="number" value="3" class="quantity"></td>

                    <td><span class="table__subtotal">$220</span></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-7-1.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><input type="number" value="3" class="quantity"></td>

                    <td><span class="table__subtotal">$220</span></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-2-1.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><input type="number" value="3" class="quantity"></td>

                    <td><span class="table__subtotal">$220</span></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>
            </table>
        </div>

        <div class="cart__actions">
            <a href="" class="btn flex btn--md">
                <i class="ri-shuffle-line"></i> Update Cart
            </a>

            <a href="" class="btn flex btn--md">
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
                        <td><span class="cart__total-price">$240.00</span></td>
                    </tr>

                    <tr>
                        <td><span class="cart__total-title">Shipping</span></td>
                        <td><span class="cart__total-price">$10.00</span></td>
                    </tr>

                    <tr>
                        <td><span class="cart__total-title">Total</span></td>
                        <td><span class="cart__total-price">$240.00</span></td>
                    </tr> 
                </table>

                <a href="#" class="btn flex btn--md">
                    <i class="ri-shopping-cart-line"></i></i> Proceed To checkout
                </a>
            </div>
        </div>
    </section>
    @endsection