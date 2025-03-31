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
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-field">
                <label for=""> <h4>Category Name</h4> </label>
                <input type="text" name="category_name" value="{{ old('category_name') }}" required>
            </div>

            <div class="input-field">
                <label for=""> <h4>Add Image</h4> </label>
                <input type="file" name="image" required accept="image/*">
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Category</button>
            </div>
        </form>

        <div class="data">
            <h3>All Categories</h3>
            <div>
                @forelse ($categories as $category)
                    <div class="data-body">
                        <h4><strong> {{ $category->name }} </strong></h4>
                        {{-- <div class="flex">
                            <p>Status:</p>
                            <form action="" method="post">
                                @csrf
                                <button class="btn btn--sm delete">Deactivate</button>
                            </form>
                        </div> --}}
                    </div>
                @empty
                    <p>You have not added any category yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
