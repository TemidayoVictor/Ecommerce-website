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
                <label for=""> <h4>Category Name</h4> </label>
                <input type="text" name="category_name" value="{{ old('category_name') }}" required>
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md">Add Category</button>
            </div>
        </form>
    </div>
@endsection
