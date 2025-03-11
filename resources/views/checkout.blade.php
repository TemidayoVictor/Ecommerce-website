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
                <h3 class="section__title">Cart Totals</h3>
                <div class="order-body">
                    @forelse ($cartItem as $key => $item)
                        <div class="order-container">
                            <div class="right-con">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="" class="order__img">
                            </div>
                            <div class="left-con">
                                <h4>{{ $item['name'] }}</h4>
                                <div class="flex-4">
                                    <p>Qty: {{ $item['quantity'] }} {{ $item['quantity'] > 1 ? "Units" : "Unit" }}</p>
                                    <p>NGN {{ number_format($item['price'] * $item['quantity']) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>You have not added any products to the cart</p>
                    @endforelse
                    <div class="checkout_total">
                        <div class="flex-4">
                            <h4>Sub-Total</h4>
                            <p>NGN {{ number_format($total) }}</p>
                        </div>
                        <div class="flex-4">
                            <h4>Shipping</h4>
                            <p>NGN  {{number_format($shipping) }}</p>
                        </div>
                        <div class="flex-4">
                            <h4>Grand Total</h4>
                            <p>NGN  {{number_format($shipping + $total) }}</p>
                        </div>
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
