@extends('admin.layouts.app')

@section('title')
    All Orders
@endsection

@section('content')

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
                        <div class="flex">
                            <p>Qty: {{ $item->quantity }} {{ $item->quantity > 1 ? "Units" : "Unit" }}</p>
                            <p>NGN {{ number_format($item->amount) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>There are no items in this order</p>
            @endforelse
            <div class="white sub">
                <div class="flex">
                    <h4>Sub-Total</h4>
                    <p>NGN  {{number_format($order->total) }}</p>
                </div>
                <div class="flex">
                    <h4>Shipping</h4>
                    <p>NGN  {{number_format($order->shipping) }}</p>
                </div>
                <div class="flex">
                    <h4>Grand Total</h4>
                    <p>NGN  {{number_format($order->shipping + $order->total) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="left white">
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
                    <div class="flex">
                        <a href=" {{ "tel:".$order->phone }} " class="stat success">Phone</a>
                        <a href={{ "https://wa.me/234".$order->phone }} target="_blank" class="stat success">Whatsapp</a>
                    </div>
                </div>
            </div>
            <div class="detail-box">
                <h4>Additional Info</h4>
                <p style="text-align: justify;"> {{ $order->additional_information }} </p>
            </div>
        </div>
        <div class="details-actions">
            <div class="flex">
                <p>Payment Status:</p>
                @if($order->status == "Paid")
                    <p class="stat success">Paid</p>
                @else
                    <p class="stat pending">Pending</p>
                @endif
            </div>
            <form action=" {{ route('admin.update-payment', ['id' => $order->id]) }} " method="post" style="margin-block: 1em;">
                @csrf
                @if($order->status == "Paid")
                    <input type="hidden" name="status" value="Pending">
                    <button class="btn btn--sm block pending">Mark as Unpaid</button>
                @else
                    <input type="hidden" name="status" value="Paid">
                    <button class="btn btn--sm block">Mark as Paid</button>
                @endif
            </form>

            <div class="flex">
                <p>Shippng Status:</p>
                @if($order->shipping_status == "Delivered")
                    <p class="stat success">Delivered</p>
                @else
                    <p class="stat pending">Not Delivered</p>
                @endif
            </div>
            <form action=" {{ route('admin.update-shipping', ['id' => $order->id]) }} " method="post" style="margin-block: 1em;">
                @csrf
                @if($order->shipping_status == "Delivered")
                    <input type="hidden" name="status" value="Undelivered">
                    <button class="btn btn--sm block pending">Mark as Undelivered</button>
                @else
                    <input type="hidden" name="status" value="Delivered">
                    <button class="btn btn--sm block">Mark as Delievered</button>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection
