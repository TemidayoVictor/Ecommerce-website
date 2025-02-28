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
        <form action="">
            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="category" id="">
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand</h4> </label>
                <select name="" id="">
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </select>
            </div>

            <div class="input-field">
                <label for="">  <h4>Product Name</h4> </label>
                <input type="text">
            </div>

            <div class="input-field">
                <label for=""> <h4>Product Description</h4> </label>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="input-field">
                <label for="">  <h4>Price</h4> </label>
                <input type="text">
            </div>

            <div class="input-field">
                <label for="">  <h4>Sales Price</h4> </label>
                <input type="text">
            </div>

            <div class="input-field">
                <label for="">  <h4>Stock</h4> </label>
                <input type="text">
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Product</button>
            </div>
        </form>
    </div>
@endsection
