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
                        <span> (+01) - 2345 - 6799</span>
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
                    <img src="{{ asset('assets/logo.svg') }}" alt="" class="nav__logo-img">
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

            <footer class="footer container">
                <div class="footer__container grid">
                    
                    <div class="footer__content">
                        <a href="" class="footer__logo">
                            <img src="{{ asset('assets/logo.svg') }}" alt="" class="footer__logo-img">
                        </a>
                        <h4 class="footer__subtitle">Contact</h4>
                        
                        <p class="footer__description">
                            <span>Address: </span> 562 Wellington Road, Street 32, Sanfrancisco
                        </p>

                        <p class="footer__description">
                            <span>Phone: </span> (+234) 8139943234
                        </p>

                        <p class="footer__description">
                            <span>Hours: </span> 10:00 - 18:00 Mon - Sat
                        </p>

                        <div class="footer__social">
                            
                            <h4 class="footer__subtitle">Follow Us</h4>

                            <div class="footer__social-links flex-1">
                                
                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-facebook.svg') }}" alt="" class="footer__social-icon">
                                </a>

                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-twitter.svg') }}" alt="" class="footer__social-icon">
                                </a>

                                <a href="" class="footer__logo">
                                    <img src="{{ asset('assets/icon-instagram.svg') }}" alt="" class="footer__social-icon">
                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Address</h3>
                        <ul class="footer__links">
                            <li> <a href="" class="footer__link">About Us</a> </li>
                            <li> <a href="" class="footer__link">Delivery Information</a> </li>
                            <li> <a href="" class="footer__link">Privacy Policy</a> </li>
                            <li> <a href="" class="footer__link">Terms & Conditions</a> </li>
                            <li> <a href="" class="footer__link">Contact Us</a> </li>
                            <li> <a href="" class="footer__link">Support Center</a> </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">My Account</h3>
                        <ul class="footer__links">
                            <li> <a href="" class="footer__link">Sign In</a> </li>
                            <li> <a href="" class="footer__link">View Cart</a> </li>
                            <li> <a href="" class="footer__link">My Wishlist</a> </li>
                            <li> <a href="" class="footer__link">Track My Order</a> </li>
                            <li> <a href="" class="footer__link">Help</a> </li>
                            <li> <a href="" class="footer__link">Order</a> </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Secure Payments Gateways</h3>
                        <img src="{{ asset('assets/payment-method.png') }}" alt="" class="payment__img">
                    </div>

                </div>

                <div class="footer__bottom">
                    <p class="copyright">&copy; 2023 Evara. All Rights Reserved</p>
                    <span class="designer">Designed by Developers</span>
                </div>
            </footer>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src=" {{ asset('js/script.js') }} "></script>
    </body>
</html>