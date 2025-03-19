@extends('admin.layouts.app')

@section('title')
    Create User
@endsection

@section('content')

<div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class="">Add a User</h3>
            <a href="{{ route('admin.users') }}" class="btn btn--sm">Users</a>
        </div>

        <div class="admin-page">
        <h2>Add New User</h2>

        <form action="{{ route('admin.users.store') }}" method="POST" class="admin-form">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="form-group checkbox">
                <label>
                    <input type="checkbox" name="is_admin"> Make Admin
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn--md">Add User</button>
            </div>
        </form>
    </div>
</div>

@endsection