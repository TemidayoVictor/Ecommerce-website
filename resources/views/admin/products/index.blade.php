@extends('admin.layouts.app')

@section('title')
    All Products
@endsection

@section('content')
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Products</h3>
            <a href="{{ route('admin.add-products') }}" class="btn btn--sm">Add Products</a>
        </div>
        <div>
            <div class="product-box-container">
                @foreach ($errors->all() as $message)
                    <div id="notification" class="status stat-2 failed">
                        <p>{{ $message }}</p>
                    </div>
                @endforeach

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
                @forelse ($products as $product)
                    <div class="flex product-box">
                        <div class="flex-2 left">
                            <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="Product Image">
                            <div>
                                <h4 class="product-title">{{ $product->name }}</h4>
                                <div class="flex">
                                    <p><strong>Price:</strong></p>
                                    <p>NGN {{ number_format($product->price) }}</p>
                                </div>
                                <div class="flex">
                                    <p><strong>Category:</strong></p>
                                    <p> {{ $product->category->name }} </p>
                                </div>
                                <div class="flex">
                                    <p><strong>Available Stock:</strong></p>
                                    @if($product->stock > 0)
                                        <p>{{ $product->stock }} Unit(s)</p>
                                    @else
                                        <p style="color: red">Out of Stock</p>
                                    @endif
                                </div>
                                <div style="margin-top: .5rem" class="flex">
                                    <a href=" {{ route('admin.edit-products', ['id' => $product->id ]) }} " class="btn btn--sm">Edit</a>
                                    <form action=" {{ route('admin.delete-product', ['id' => $product->id]) }} " method="post">
                                        @csrf
                                        <button class="btn btn--sm delete">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="text-align:center">You have not added any Product yet</p>
                @endforelse
            </div>

        </div>
    </div>
@endsection
