@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
@if($pageTitle == 'Kitchen')

<div>
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Add Food Item</h3>
            @include('admin.partials.productlinks')
        </div>
        <form action="{{ route('admin.add-products') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-field" style="display: none;">
                <label for=""> <h4>Category</h4> </label>
                <input type="text" name="category" id="category" value="{{ $kitchen->id }}" required readonly>
            </div>

            <div class="input-field">
                <label for=""> <h4>Sub category</h4> </label>
                <select name="brand">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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

            <div class="input-field" style="display: none;">
                <label for="">  <h4>Available Stock</h4> </label>
                <input type="number" name="stock" value="10" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file" name="images[]" multiple required accept="image/*">
            </div>

            <div style="margin-block: 1em;">
                <input type="checkbox" name="featured">
                <span style="margin-left: .5rem;">Add to Featured Products</span>
            </div>

            <div class="input-field" style="display:none;">
                <label for="">  <h4>Type</h4> </label>
                <input type="text" name="type" value="kitchen">
            </div>

            {{-- <h3 class="section-title">Add Extra Fields</h3>

            <div id="extraFields">
                <div class="extra-field flex"></div>
            </div>

            <button type="button" onclick="addField()" class="btn btn--sm add">Add More</button> --}}

            <div class="input-field">
                <button type="submit" class="btn btn--md" style="margin-top: 1rem">Add Item</button>
            </div>
        </form>
    </div>
</div>

@else
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Add Product</h3>
            @include('admin.partials.productlinks')
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="category" id="category" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand</h4> </label>
                <select id="brand" name="brand" disabled>
                    <option value="">Select Brand</option>
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

            <div style="margin-block: 1em;">
                <input type="checkbox" name="featured">
                <span style="margin-left: .5rem;">Add to Featured Products</span>
            </div>

            <h3 class="section-title">Add Extra Fields</h3>

            <div id="extraFields">
                <div class="extra-field flex"></div>
            </div>

            <button type="button" onclick="addField()" class="btn btn--sm add">Add More</button>

            <div class="input-field">
                <button type="submit" class="btn btn--md" style="margin-top: 1rem">Add Product</button>
            </div>
        </form>
    </div>
@endif

@endsection

@push('scripts')
    @include('scripts.category-brand')
@endpush