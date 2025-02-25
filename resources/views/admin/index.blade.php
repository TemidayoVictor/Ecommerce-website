@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="quick-views admin-section">
        <div class="view">
            <div class="number">
                <h3>200</h3>
            </div>
            <p>Users</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>250</h3>
            </div>
            <p>Products Sold</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>NGN 20,000</h3>
            </div>
            <p>Monthly Revenue</p>
        </div>

        <div class="view">
            <div class="number">
                <h3>30</h3>
            </div>
            <p>Pending Orders</p>
        </div>
    </div>

    <div class="product-continer admin-section">
        <h3 class="section-title">Add Product</h3>
        <form action="">
            <div class="input-field">
                <label for=""> <h4>Category</h4> </label>
                <select name="" id="">
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
                <label for=""> <h4>Add Images</h4> </label>
                <input type="file">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Product</button>
            </div>
        </form>
    </div>
@endsection
