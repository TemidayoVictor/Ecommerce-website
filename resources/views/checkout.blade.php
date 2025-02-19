@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

<section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Checkout</span></li>
    </ul>
</section>

<section class="checkout section--lg">
    <div class="checkout__container container grid">
        <div class="checkout__group">
            <h3 class="section__title">Billing Details</h3>

            <form action="" class="form grid">
                <input type="text" placeholder="Name" class="form__input">

                <input type="text" placeholder="Address" class="form__input">

                <input type="text" placeholder="City" class="form__input">

                <input type="text" placeholder="Country" class="form__input">

                <input type="text" placeholder="Postcode" class="form__input">

                <input type="text" placeholder="Phone" class="form__input">

                <input type="text" placeholder="Email" class="form__input">

                <h3 class="checkout__title">Additional Information</h3>

                <textarea name="" placeholder="Order note" id="" cols="30" rows="10" class="form__input textarea"></textarea>
            </form>

        </div>

        <div class="checkout__group">
            <h3 class="section__title">Cart Totals</h3>

            <table class="order__table">
                <tr>
                    <th colspan="2">Products</th>
                    <th>Total</th>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="order__img">
                    </td>

                    <td>
                        <h3 class="table__title">Yidarton Women Summer Blue</h3>
                        <p class="table__quantity">x 2</p>
                    </td>

                    <td><span class="table__price">$180</span></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="order__img">
                    </td>

                    <td>
                        <h3 class="table__title">Yidarton Women Summer Blue</h3>
                        <p class="table__quantity">x 2</p>
                    </td>

                    <td><span class="table__price">$180</span></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="order__img">
                    </td>

                    <td>
                        <h3 class="table__title">Yidarton Women Summer Blue</h3>
                        <p class="table__quantity">x 2</p>
                    </td>

                    <td><span class="table__price">$180</span></td>
                </tr>

                <tr>
                    <td>
                        <span  class="order__subtitle">SubTotal</span>
                    </td>
                    <td colspan="2"><span class="table__price">$280.00</span></td>
                </tr>

                <tr>
                    <td><span class="order__subtitle">Shipping</span></td>
                    <td colspan="2"><span class="table__price">$280.00</span></td>
                </tr>

                <tr>
                    <td><span class="order__subtitle">Shipping</span></td>
                    <td colspan="2"><span class="order__grand-total">$280.00</span></td>
                </tr>
            </table>

            <div class="payment__methods">
                <h3 class="checkout__title payment__title">Payment</h3>
                <div class="payment__option flex-1">
                    <input type="radio" class="payment__input">
                    <label for="" class="payment__label" checked>Direct Bank Transfer</label>
                </div>

                <div class="payment__option flex-1">
                    <input type="radio" class="payment__input">
                    <label for="" class="payment__label">Checkout Payment</label>
                </div>

                <div class="payment__option flex-1">
                    <input type="radio" class="payment__input">
                    <label for="" class="payment__label">Paypal</label>
                </div>
            </div>

            <button type="submit" class="btn btn--sm">Place Order</button>
        </div>
    </div>
</section>



@endsection