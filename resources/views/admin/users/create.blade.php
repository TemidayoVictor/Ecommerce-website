@extends('admin.layouts.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="product-continer admin-section">
        <div class="admin flex section-title">
            <h3 class=""> {{ $pageTitle }} </h3>
            <a href="{{ route('admin.users') }}" class="btn btn--sm">Users</a>
        </div>
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf

            <div class="flex">
                <div class="input-field">
                    <label for="">  <h4>Name</h4> </label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" required>
                </div>

                <div class="input-field">
                    <label for=""> <h4>Email</h4> </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="flex">
                <div class="input-field">
                    <label for="">  <h4>Password</h4> </label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="input-field">
                    <label for="">  <h4>Confirm Password</h4> </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div>

            <div style="margin-block: 1em;">
                <input type="checkbox" name="is_admin">
                <span style="margin-left: .5rem;">Make Admin</span>
            </div>

            <div class="input-field">
                <button type="submit" class="btn btn--md" style="margin-top: 1rem">Add User</button>
            </div>
        </form>
    </div>
@endsection
