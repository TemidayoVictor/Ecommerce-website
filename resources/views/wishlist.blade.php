@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')


<section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="{{ url('/') }}" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Wishlist</span></li>
    </ul>
</section>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

                @forelse($wishlistItems as $productId => $item)
                    <tr class="wishlist-item" data-id="{{ $item->id }}">
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

                        <td><a href="" class="btn btn btn--sm add__btn" data-id="{{ $item->id }}">Add to cart</a></td>

                        <td>
                            <button type="submit" id="remove-wishlist-btn" data-id="{{ $item->id }}">
                                <i class="ri-delete-bin-line table__trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" style="width: 100%; text-align: center; padding: .5rem;">
                            Your wishlist is currently empty.
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>
@endsection