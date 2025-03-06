@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class=""> {{ $pageTitle }} </h3>
            @include('admin.partials.productlinks')
        </div>
        <form action="" method="POST">
            @csrf

            <div class="input-field">
                <label for=""> <h4>Select Category</h4> </label>
                <select name="category" id="" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field">
                <label for=""> <h4>Brand Name</h4> </label>
                <input type="text" name="brand_name" value="{{ old('brand_name') }}" required>
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Category</button>
            </div>
        </form>

        <div class="data">
            <h3>All Brands</h3>
            <div>
                @forelse ($brands as $brand)
                    <div class="data-body">
                        <p><strong> {{ $brand->name }} </strong></p>
                        <div class="flex" style="margin-block: .5em;">
                            <p>Category:</p>
                            <p> {{ $brand->category->name }} </p>
                        </div>
                        <div class="flex">
                            <p>Status:</p>
                            <form action="" method="post">
                                @csrf
                                <button class="btn btn--sm delete">Deactivate</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>You have not added any brand yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
