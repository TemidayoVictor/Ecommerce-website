@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Add Product</h3>
            @include('admin.partials.productlinks')
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

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

            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="category" id="" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand</h4> </label>
                <select name="brand" id="">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for="">  <h4>Product Name</h4> </label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Product Description</h4> </label>
                <textarea name="product_description" id="" cols="30" rows="10" required>{{ old('product_description') }}</textarea>
            </div>

            <div class="input-field">
                <label for="">  <h4>General Price</h4> </label>
                <input type="number" name="price" value="{{ old('price') }}" required>
            </div>

            <div class="input-field">
                <label for="">  <h4>Sales Price</h4> </label>
                <input type="number" name="sales" value="{{ old('sales') }}">
            </div>

            <div class="input-field">
                <label for="">  <h4>Available Stock</h4> </label>
                <input type="number" name="stock" value="{{ old('stock') }}" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file" name="images[]" multiple required accept="image/*">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Product</button>
            </div>
        </form>
    </div>
@endsection
