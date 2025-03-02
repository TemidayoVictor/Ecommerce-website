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
        <li><span class="breadcrumb__link">Wishlist</span></li>
    </ul>
</section>

@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($wishlistItems->isEmpty())
        <p>Your wishlist is empty.</p>
    @else
     
<!-- WISHLIST -->
<section class="wishlist section--lg container">
<div class="table__container">
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th>Action</th>
                    <th>Remove</th>
                </tr>
                @foreach($wishlistItems as $item)
                <tr>
                    <td>
                    @if($item->product->productImage->isNotEmpty())
                    <img src="{{ asset('storage/' . $item->product->productImage->last()->image) }}" alt="{{ $item->product->name }}" class="table__img">
                    @else
                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="table__img">
                    @endif
                    </td>

                    <td>
                        <h3 class="table__title">{{ $item->product->name }}</h3>
                        <p class="table__description">
                        {{ $item->product->description ?? 'No description available' }}
                        </p>
                    </td>

                    <td><span class="table__price">NGN{{ number_format($item->product->price, 2) }}</span></td>

                    <td><span class="table__stock">{{ $item->product->stock_status ?? 'In Stock' }}</span></td>

                    <td><a href="" class="btn btn btn--sm">Add to cart</a></td>

                    <td><form action="{{ route('wishlist.remove', $item->id) }}" method="POST" onsubmit="return confirm('Remove this product from your wishlist?');">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn--sm">
                        <i class="ri-delete-bin-line table__trash"></i>
                    </button>
                    </form>
                    </td>
                </tr>

                
                @endforeach
            </table>
        </div>
</section>
@endif
@endsection