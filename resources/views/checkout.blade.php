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

    @if (session('success'))
        <div id="notification" class="status stat-2 success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div  class=" notification status stat-2 failed">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <section class="checkout section--lg">
        <div class="checkout__container container grid">
            <div class="checkout__group">
                <h3 class="section__title">Cart Totals</h3>

                <table class="order__table">
                    <tr>
                        <th colspan="2">Products</th>
                        <th>Total</th>
                    </tr>

                    @forelse($cartItem as $key => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="" class="order__img">
                            </td>

                            <td>
                                <h3 class="table__title">{{ $item['name'] }}</h3>
                                <p class="table__quantity">x {{ $item['quantity'] }}</p>
                            </td>

                            <td><span class="table__price"> NGN {{ number_format($item['price'] * $item['quantity']) }}</span></td>
                        </tr>
                    @empty
                        <p>You have not added any products to the cart</p>
                    @endforelse

                    <tr>
                        <td>
                            <span  class="order__subtitle">Sub-Total</span>
                        </td>
                        <td colspan="2"><span class="table__price">NGN {{ number_format($total) }} </span></td>
                    </tr>

                    <tr>
                        <td><span class="order__subtitle">Shipping</span></td>
                        <td colspan="2"><span class="table__price">NGN {{ number_format($shipping) }}</span></td>
                    </tr>

                    <tr>
                        <td><span class="order__subtitle">Grand Total</span></td>
                        <td colspan="2"><span class="order__grand-total">NGN {{ number_format($total + $shipping) }}</span></td>
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
            </div>

            <div class="checkout__group">
                <h3 class="section__title">Billing Details</h3>

                <form action="" class="form grid" method="post">
                    @csrf
                    <div style="width:100%;">
                        <h4 class="checkout__title">Name</h4>
                        <input style="width:100%;" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required class="form__input">
                    </div>
                    <div>
                        <h4 class="checkout__title">Address</h4>
                        <input style="width:100%;" type="text" placeholder="Address" name="address" value="{{ old('address') }}" required class="form__input">
                    </div>
                    <div>
                        <h4 class="checkout__title">City</h4>
                        <input style="width:100%;" type="text" placeholder="City" name="city" value="{{ old('city') }}" required class="form__input">
                    </div>
                    <div>
                        <h4 class="checkout__title">Country</h4>
                        <input style="width:100%;" type="text" placeholder="Country" name="country" value="{{ old('country') }}" required class="form__input">
                    </div>
                    <div>
                        <h4 class="checkout__title">Phone</h4>
                        <input style="width:100%;" type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" required class="form__input">
                    </div>
                    <div>
                        <h4 class="checkout__title">Email</h4>
                        <input style="width:100%;" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required class="form__input">
                    </div>

                    <h3 class="checkout__title">Additional Information</h3>

                    <textarea name="note" placeholder="Order note" id="" cols="10" rows="10" class="form__input textarea"> {{ old('note') }} </textarea>

                    <button type="submit" class="btn btn--sm">Place Order</button>
                </form>

            </div>
        </div>
    </section>
@endsection
