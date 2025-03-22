@extends('layouts.app')

@section('title')
    
@endsection

@section('content')

<section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Reset Password</span></li>
    </ul>
</section>

<section class="auth-section">
    <h3>Forgot Your Password?</h3>

    @if (session('status'))
        <p class="success-message">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label>Email Address</label>
        <input type="email" name="email" class="form__input" required>

        <button type="submit" class="btn btn--md">Send Password Reset Link</button>
    </form>

    <p><a href="{{ route('login') }}" class="forgot-password">Back to Login</a></p>
</section>

@endsection