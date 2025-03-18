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

    <section class="checkout section--lg container">
        <div class="orders flex-3">

            <div class="right">
                <h3>Order Summary</h3>
                <div class="order-body">
                    @forelse ($order->orderItem as $key => $item)
                        <div class="order-container">
                            <div class="right-con">
                                <img src="{{ asset('storage/' . $item->product->productImage->last()->image) }}" alt="">
                            </div>
                            <div class="left-con">
                                <h4>{{ $item->product->name }}</h4>
                                <div class="flex-4">
                                    <p>Qty: {{ $item->quantity }} {{ $item->quantity > 1 ? "Units" : "Unit" }}</p>
                                    <p>NGN {{ number_format($item->amount) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>There are no items in this order</p>
                    @endforelse
                    <div class="checkout_total">
                        <div class="flex-4">
                            <h4>Sub-Total</h4>
                            <p>NGN  {{number_format($order->total) }}</p>
                        </div>
                        <div class="flex-4">
                            <h4>Shipping</h4>
                            <p>NGN  {{number_format($order->shipping) }}</p>
                        </div>
                        @if ($coupon)
                            <div class="flex-4">
                                <h4>Total</h4>
                                <p>NGN  {{number_format($order->shipping + $order->total) }}</p>
                            </div>

                            @if ($coupon->type == 'fixed')
                                <div class="flex-4">
                                    <h4>Coupon discount</h4>
                                    <p> - NGN {{ $coupon->discount }}</p>
                                </div>
                                <div class="flex-4">
                                    <h4>Grand Total</h4>
                                    <p>NGN  {{number_format($order->shipping + $order->total - $coupon->discount) }}</p>
                                </div>
                            @else
                                <div class="flex-4">
                                    <h4>Coupon discount</h4>
                                    <p>{{ $coupon->discount }}% off</p>
                                </div>
                                <div class="flex-4">
                                    <h4>Grand Total</h4>
                                    <p>NGN  {{number_format($order->shipping + $order->total - (($coupon->discount / 100) * $order->total )) }}</p>
                                </div>
                            @endif

                        @else
                            <div class="flex-4">
                                <h4>Grand Total</h4>
                                <p>NGN  {{number_format($order->shipping + $order->total) }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="left white">
                <div class="checkout_total">
                    <div class="title">
                        <h3>Client Details</h3>
                    </div>
                    <div class="details-cont">
                        <div class="detail-box">
                            <h4>Name</h4>
                            <p> {{ $order->name }} </p>
                        </div>
                        <div class="detail-box">
                            <h4>Address</h4>
                            <p>{{ $order->address }}</p>
                        </div>
                        <div class="detail-box">
                            <h4>City</h4>
                            <p>{{ $order->city }}</p>
                        </div>
                        <div class="detail-box">
                            <h4>Country</h4>
                            <p>{{ $order->country }}</p>
                        </div>
                        <div class="detail-box">
                            <h4>Email</h4>
                            <p>{{ $order->email }}</p>
                        </div>
                        <div class="detail-box">
                            <h4>Phone</h4>
                            <div class="flex">
                                <p>{{ $order->phone }}</p>
                            </div>
                        </div>
                        <div class="detail-box">
                            @if($order->additional_information != "NULL")
                                <h4>Additional Info</h4>
                                <p style="text-align: justify;"> {{ $order->additional_information }} </p>
                            @endif
                        </div>
                    </div>
                    <div class="details-actions">
                        <div class="flex-4">
                            <p>Payment Status:</p>
                            @if($order->status == "Paid")
                                <p class="stat success">Paid</p>
                            @else
                                <p class="stat pending">Pending</p>
                            @endif
                        </div>

                        <div class="flex-4" style="margin-top: 1em;">
                            <p>Shippng Status:</p>
                            @if($order->shipping_status == "Delivered")
                                <p class="stat success">Delivered</p>
                            @else
                                <p class="stat pending">Not Delivered</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
