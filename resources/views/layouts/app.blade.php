<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="content">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" href="" type="image/png" sizes="160x160">
        <link rel="stylesheet" href="{{ asset ('css/style.css')}}">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        
        {{-- fontawesome kit --}}
        <script src="https://kit.fontawesome.com/23bcbedea7.js" crossorigin="anonymous"></script>
        <title>E Commerce Website || @yield('title')</title>
    </head>
    <body>
        <header class="header">
            <div class="header__top">
                <div class="header__container container">
                    <div class="header__contact">
                        <span> +1 (757) - 648 - 9243</span>
                        <span>Our Location</span>
                    </div>
                    <p class="header__alert-news">
                        Super Value Deals - Save more with coupons
                    </p>
                    <a href="#" class="header__top-action">
                        Log In / Sign up
                    </a>
                </div>
            </div>

            <nav class="nav container">
                <a href="" class="nav__logo">
                    <img src="{{ asset('assets/T&T logo.jpg') }}" alt="" class="nav__logo-img">
                </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="" class="nav__link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="" class="nav__link">Shop</a>
                        </li>

                        <li class="nav__item">
                            <a href="" class="nav__link">My Account</a>
                        </li>

                        <li class="nav__item">
                            <a href="" class="nav__link">Compare</a>
                        </li>

                        <li class="nav__item">
                            <a href="" class="nav__link">Login</a>
                        </li>
                    </ul>

                    <div class="header__search">
                        <input type="text" placeholder="Search for Items" class="form__input">
                        <button class="search__btn">
                            <img src=" {{ asset('assets/search.png') }} " alt="">
                        </button>
                    </div>
                </div>

                <div class="header__user-actions">
                    <a href="" class="header__action-btn">
                        <img src="{{ asset('assets/icon-heart.svg') }}" alt="">
                        <span class="count">3</span>
                    </a>

                    <a href="" class="header__action-btn">
                        <img src="{{ asset('assets/icon-cart.svg') }}" alt="">
                        <span class="count">3</span>
                    </a>
                </div>
            </nav>
        </header>

        <main class="main">
            
        @yield('content')
            
        </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=" {{ asset('js/script.js') }} "></script>
</body>

</html>