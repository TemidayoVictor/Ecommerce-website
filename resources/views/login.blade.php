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

            <form action="" class="form grid">
                <input type="email" class="form__input" placeholder="Your Email">

                <input type="password" class="form__input" placeholder="Your Password">

                <div class="form__btn">
                    <button type="submit" class="btn--sm btn">Login</button>
                </div>
            </form>
        </div>

        <div class="register">
            <h3 class="section__title">Create An Account</h3>

            <form action="" class="form grid">
                <input type="text" class="form__input" placeholder="Username">

                <input type="email" class="form__input" placeholder="Your Email">

                <input type="password" class="form__input" placeholder="Your Password">

                <input type="password" class="form__input" placeholder="Confirm Password">

                <div class="form__btn">
                    <button type="submit" class="btn--sm btn">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection