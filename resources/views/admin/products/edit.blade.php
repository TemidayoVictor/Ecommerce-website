@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Edit Product</h3>
            @include('admin.partials.productlinks')
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="category" id="" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand</h4> </label>
                <select name="brand" id="">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for="">  <h4>Product Name</h4> </label>
                <input type="text" name="product_name" value="{{ $product->name }}" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Product Description</h4> </label>
                <textarea name="product_description" id="" cols="30" rows="10" required>{{ $product->description }}</textarea>
            </div>

            <div class="input-field">
                <label for="">  <h4>General Price</h4> </label>
                <input type="number" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="input-field">
                <label for="">  <h4>Sales Price</h4> </label>
                <input type="number" name="sales" value="{{ $product->sales }}">
            </div>

            <div class="input-field">
                <label for="">  <h4>Available Stock</h4> </label>
                <input type="number" name="stock" value="{{ $product->stock }}" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file" name="images[]" multiple accept="image/*">
            </div>

            <h3 class="section-title">Add Extra Fields</h3>

            <div id="extraFields"></div>

            <button type="button" onclick="addField()" class="btn btn--sm add">Add More</button>

            <div class="input-field">
                <button type="submit" class="btn btn--md" style="margin-top: 1rem">Edit Product</button>
            </div>
        </form>

        <h3 class="section-title">Product Images</h3>
        <div class="images-container">
            @forelse ($product->productImage as $image )
                <div>
                    <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image">
                    <form action=" {{ route('admin.delete-image',['id' => $image->id]) }} " method="post">
                        @csrf
                        <button class="btn btn--sm delete" style="width: 100%">Delete</button>
                    </form>
                </div>
            @empty
                <p>This Product does not have any image</p>
            @endforelse
        </div>

        @if ($product->productAddition->count())
            <h3 class="section-title">Extra Fields</h3>
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product->productAddition as $index => $field )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>  {{ $field->name }}</td>
                                <td> {{ $field->value }} </td>
                                <td>
                                    <form action=" {{ route('admin.delete-addition',['id' => $field->id]) }} " method="post">
                                        @csrf
                                        <button class="btn btn--sm delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
