@extends('layouts.app')

@section('content')

<section class="auth-section">
    <h3>Reset Your Password</h3>

    @if (session('status'))
        <p class="success-message">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label>Email Address</label>
        <input type="email" name="email" class="form__input" required>

        <label>New Password</label>
        <input type="password" name="password" class="form__input" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form__input" required>

        <button type="submit" class="btn btn--md">Reset Password</button>
    </form>
</section>

@endsection
