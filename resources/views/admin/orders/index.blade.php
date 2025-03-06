@extends('admin.layouts.app')

@section('title')
    All Orders
@endsection

@section('content')

<div class="orders">
    @forelse($orders as $key => $order)
        <a href=" {{ route('admin.order.show', ['id' => $order->id]) }} " class="order-box">
            <div class="flex">
                <h3>{{ $order->name }}</h3>
                <h3>NGN {{ number_format($order->total) }}</h3>
            </div>
            <div class="flex">
                {{-- <p>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans(); }}</p> --}}
                <p>{{ $order->created_at->format('F d, Y') }}</p>
                <div class="flex">
                    @if($order->status == "Paid")
                        <p class="stat success">Approved</p>
                    @else
                        <p class="stat pending">Pending</p>
                    @endif
                    @if($order->shipping_status == "Delivered")
                        <p class="stat success">Delivered</p>
                    @else
                        <p class="stat pending">Not Delivered</p>
                    @endif
                </div>
            </div>
        </a>
    @empty
        <p>You do not have any orders currently</p>
    @endforelse
</div>

@endsection
