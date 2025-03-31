@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @if ($pageTitle == 'Kitchen')

        <div class="product-continer admin-section">
            <div class="admin flex-6 section-title">
                <h3 class="">Items</h3>
                <div>
                    <a href="{{ route('admin.add-products') }}" class="btn btn--sm">Add Kitchen Item</a>
                    <a href="{{ route('admin.products') }}" class="btn btn--sm">Products</a>
                </div>
            </div>
            <div>
                <div class="product-box-container">
                    @forelse ($products as $product)
                        <div class="flex product-box">
                            <div class="flex-2 left">
                                <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="Product Image">
                                <div class="product-body">
                                    <h4 class="product-title">{{ $product->name }}</h4>
                                    <div class="flex-6">
                                        <p><strong>Price:</strong></p>
                                        <p>NGN {{ number_format($product->price) }}</p>
                                    </div>
                                    <div class="flex-6">
                                        <p><strong>Category:</strong></p>
                                        <p> {{ $product->category->name }} </p>
                                    </div>
                                    <div class="flex-6">
                                        <p><strong>Available Stock:</strong></p>
                                        @if($product->stock > 0)
                                            <p>{{ $product->stock }} Unit(s)</p>
                                        @else
                                            <p style="color: red">Out of Stock</p>
                                        @endif
                                    </div>
                                    <div style="margin-top: .5rem" class="flex-6">
                                        <a href=" {{ route('admin.edit-kitchen', ['id' => $product->id ]) }} " class="btn btn--sm">Edit</a>
                                        <form action=" {{ route('admin.delete-product', ['id' => $product->id]) }} " method="post">
                                            @csrf
                                            <button class="btn btn--sm delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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

    @else
        <div class="product-continer admin-section">
            <div class="admin flex-6 section-title">
                <h3 class="">Products</h3>
                <div>
                    <a href="{{ route('admin.add-products') }}" class="btn btn--sm">Add Products</a>
                    <a href="{{ route('admin.kitchen') }}" class="btn btn--sm">Kitchen</a>
                </div>
            </div>
            <div>
                <div class="product-box-container">
                    @forelse ($products as $product)
                        <div class="flex product-box">
                            <div class="flex-2 left">
                                <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="Product Image">
                                <div class="product-body">
                                    <h4 class="product-title">{{ $product->name }}</h4>
                                    <div class="flex-6">
                                        <p><strong>Price:</strong></p>
                                        <p>NGN {{ number_format($product->price) }}</p>
                                    </div>
                                    <div class="flex-6">
                                        <p><strong>Category:</strong></p>
                                        <p> {{ $product->category->name }} </p>
                                    </div>
                                    <div class="flex-6">
                                        <p><strong>Available Stock:</strong></p>
                                        @if($product->stock > 0)
                                            <p>{{ $product->stock }} Unit(s)</p>
                                        @else
                                            <p style="color: red">Out of Stock</p>
                                        @endif
                                    </div>
                                    <div style="margin-top: .5rem" class="flex-6">
                                        <a href=" {{ route('admin.edit-products', ['id' => $product->id ]) }} " class="btn btn--sm">Edit</a>
                                        <form action=" {{ route('admin.delete-product', ['id' => $product->id]) }} " method="post">
                                            @csrf
                                            <button class="btn btn--sm delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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
    @endif
@endsection
