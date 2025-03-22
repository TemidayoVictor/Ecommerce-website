@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

<section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Login / Register</span></li>
    </ul>
</section>

<section class="login-register section--lg">
    <div class="login-register__container container grid">
        <div class="login">
            <h3 class="section__title">Login</h3>

            <form method="POST" action=" {{ route('login.submit') }} " class="form grid">
                    @csrf
                <input type="email" name="email" class="form__input" placeholder="Your Email" id="login_email" required autofocus>

                <input type="password" name="password" class="form__input" placeholder="Your Password" id="login_password" required>

                <div class="form__btn">
                    <button type="submit" class="btn--sm btn">Login</button>
                </div>
                <p style="text-decoration:none;">
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                </p>
            </form>
        </div>

        <div class="register">
            <h3 class="section__title">Create An Account</h3>

            <form method="POST" action=" {{ route('register.submit') }} " class="form grid">
                    @csrf
                <input type="text" name="name" id="username" class="form__input" placeholder="Username" required>

                <input type="email" name="email" id="register_email" class="form__input" placeholder="Your Email" required>

                <input type="password" name="password" id="register_password" class="form__input" placeholder="Your Password" required>

                <input type="password"  name="password_confirmation" id="register_password_confirmation" class="form__input" placeholder="Confirm Password" required>

                <div class="form__btn">
                    <button type="submit" class="btn--sm btn">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection