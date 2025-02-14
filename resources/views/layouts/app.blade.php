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
            <section class="home section--lg">
                <div class="home__container container grid">
                    <div class="home__content">
                        <span class="home__subtitle">Hot Promotions</span>
                        <h1 class="home__title">Fashion Trending <span>Great Collection</span></h1>
                        <p class="home__description">Save more with coupons & up to 20% off</p>
                        <a href="" class="btn">Shop Now</a>
                    </div>
                    <img src=" {{ asset('assets/home-img.png') }} " alt="" class="home__img">
                </div>
            </section>
            <section class="categories container section">
                <div class="flex margin-bottom">
                    <h3 class="section__title-2"><span>Popular</span> Categories</h3>
                    <div class="swiper-navs">
                        <div class="">
                            <i class="swiper-move-prev ri-arrow-left-s-line"></i>
                        </div>
                        <div class="">
                            <i class=" swiper-move-next ri-arrow-right-s-line"></i>
                        </div>                    
                    </div>
                </div>
                <div class="categories__container swiper">
                    <div class="swiper-wrapper">
                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-1.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-2.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-3.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-4.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-5.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-6.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-7.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>

                        <a href="" class="category__item swiper-slide">
                            <img src="{{ asset('assets/category-8.jpg') }}" alt="" class="category__img">
                            <h3 class="category__title">T-Shirt</h3>
                        </a>
                    </div>
                </div>

            </section>
            <section class="products section container">
                <div class="tabs__btns">
                    <div class="tab__btn active-tab" data-target="#featured">Featured</div>
                    <div class="tab__btn" data-target="#popular">Popular</div>
                    <div class="tab__btn" data-target="#new-added">Newly Added</div>
                </div>

                <div class="tab__items">
                    <div class="tab__item active-tab" content id="featured">
                        <div class="products__container grid">
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-green">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab__item" content id="popular">
                        <div class="products__container grid">
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-9-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-9-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-10-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-10-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-green">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab__item" content id="new-added">
                        <div class="products__container grid">
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-6-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-7-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-7-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-green">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-blue">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="" class="product_images">
                                        <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="" class="action__btn" aria-label="Quick View">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Add to Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>

                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="ri-shuffle-line"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-orange">Hot</div>

                                </div>

                                <div class="product__content">
                                    <span class="product__category">Clothing</span>
                                    <a href="">
                                        <h3 class="product__title">Colorful Pattern Shirts</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <div class="product__price flex-1">
                                        <span class="new__price">$238.85</span>
                                        <span class="old__price">$245.8</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <section class="deals section">
                <div class="deals__container container grid">
                    <div class="deals__item">
                        <div class="deals__group">
                            <h3 class="deals__brand">Deal of the Day</h3>
                            <span class="deals__category">Limited Quantities</span>
                        </div>
                        <h4 class="deals__title">Summer Collection New Mordern Design</h4>

                        <div class="deals__price flex-1">
                            <span class="new__price">$139.00</span>
                            <span class="old__price">$160.99</span>
                        </div>

                        <div class="deals_group">
                            <p class="deals__countdown-text">Hurry up, offer ends in:</p>

                            <div class="countdown">
                                <div class="countdown__amount">
                                    <p class="countdown__period">02</p>
                                    <span class="unit">Days</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">20</p>
                                    <span class="unit">Hour</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">17</p>
                                    <span class="unit">Mins</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">30</p>
                                    <span class="unit">Secs</span>
                                </div>
                            </div>
                        </div>

                        <div class="deals__btn">
                            <a href="" class="btn btn--md">Shop Now</a>
                        </div>

                    </div>

                    <div class="deals__item">
                        <div class="deals__group">
                            <h3 class="deals__brand">Women Clothing</h3>
                            <span class="deals__category">Try something new this vacation</span>
                        </div>
                        <h4 class="deals__title">Summer Collection New Mordern Design</h4>

                        <div class="deals__price flex-1">
                            <span class="new__price">$139.00</span>
                            <span class="old__price">$160.99</span>
                        </div>

                        <div class="deals_group">
                            <p class="deals__countdown-text">Hurry up, offer ends in:</p>

                            <div class="countdown">
                                <div class="countdown__amount">
                                    <p class="countdown__period">02</p>
                                    <span class="unit">Days</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">20</p>
                                    <span class="unit">Hour</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">17</p>
                                    <span class="unit">Mins</span>
                                </div>
                                <div class="countdown__amount">
                                    <p class="countdown__period">30</p>
                                    <span class="unit">Secs</span>
                                </div>
                            </div>
                        </div>

                        <div class="deals__btn">
                            <a href="" class="btn btn--md">Shop Now</a>
                        </div>

                    </div>
                </div>
            </section>

            <section class="new__arrivals container section">
                <div class="flex margin-bottom">
                    <h3 class="section__title-2"><span>New </span>Arrivals</h3>
                    <div class="swiper-navs">
                        <div class="">
                            <i class="swiper-prod-move-prev ri-arrow-left-s-line"></i>
                        </div>
                        <div class="">
                            <i class=" swiper-prod-move-next ri-arrow-right-s-line"></i>
                        </div>                    
                    </div>
                </div>
                <div class="new__container swiper">
                    <div class="swiper-wrapper">
                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-6-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-pink">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-7-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-7-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-green">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-orange">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-pink">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-blue">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-orange">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="" class="product_images">
                                    <img src="{{ asset('assets/product-1-1.jpg') }}" alt="" class="product__img default">
                                    <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>

                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="ri-shuffle-line"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-orange">Hot</div>

                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="product__price flex-1">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="ri-shopping-cart-2-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="showcase section">
                <div class="showcase__container container grid">
                    <div class="showcase__wrapper">
                        <h3 class="section__title">Hot Releases</h3>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>
                    </div>

                    <div class="showcase__wrapper">
                        <h3 class="section__title">Hot Releases</h3>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>
                    </div>

                    <div class="showcase__wrapper">
                        <h3 class="section__title">Hot Releases</h3>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                            <a href="">
                                <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                            </a>

                            <div class="showcase__price flex">
                                <span class="new__price">$238.85</span>
                                <span class="old__price">$245.8</span>
                            </div>

                        </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>

                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                    </div>

                    <div class="showcase__wrapper">
                        <h3 class="section__title">Hot Releases</h3>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>
                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>
                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                        <div class="showcase__item">
                            <a href="" class="showcase__img-box">
                                <img src="{{ asset('assets/product-6-1.jpg') }}" alt="" class="showcase__img">
                            </a>
                            <div class="showcase__content">
                                <a href="">
                                    <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                                </a>
    
                                <div class="showcase__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$245.8</span>
                                </div>
    
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="newsletter section home__newsletter">
                <div class="newsletter__container container grid">
                    <h3 class="newsletter__title flex">
                        <img src="{{ asset('assets/icon-email.svg') }}" class="newsletter__icon" alt="">
                        Sign up to Newsletter
                    </h3>
                    <p class="newsletter__description">
                        ... and receive $25 coupon for shopping
                    </p>
                    <form action="" class="newsletter__form">
                        <input 
                            type="text" 
                            placeholder="Enter your email" 
                            class="newsletter__input"
                        >
                        <button type="submit" class="newsletter__btn">Subscribe</button>
                    </form>
                </div>
            </section>

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