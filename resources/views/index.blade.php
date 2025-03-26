@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
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
                @if(isset($featuredProducts) && $featuredProducts->count() > 0)
                @foreach($featuredProducts as $product)
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="{{ route('product.show', $product->id) }}" class="product_images">
                                <img src="{{ asset('storage/' . $product->productImage->first()->image) }}" alt="Product Image" class="product__img default">
                                <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="" class="product__img hover">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="ri-eye-line"></i>
                                </a>

                                <a href="" class="action__btn wishlist__btn" aria-label="Add to Wishlist" data-id="{{ $product->id }}">
                                    <i class="ri-heart-line"></i>
                                </a>

                                <!-- <a href="" class="action__btn" aria-label="Compare">
                                    <i class="ri-shuffle-line"></i>
                                </a> -->
                            </div>

                            <div class="product__badge light-green">Hot</div>

                        </div>

                        <div class="product__content">
                            <span class="product__category">{{ $product->category->name }} </span>
                            <a href="{{ route('product.show', $product->id) }}">
                                <h3 class="product__title">{{ $product->name }}</h3>
                            </a>
                            <div class="product__rating">
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <div class="product__price flex-1">
                                @if($product->status == 'on_sale')
                                    <span class="new__price">NGN {{ number_format($product->sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($product->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($product->price) }}</span>
                                @endif
                            </div>
                            @if ($product->stock > 0)
                            <a href="#" class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @else
                            <a href="#" class="action__btn cart__btn btn-disabled" aria-label="Add To Cart" data-id="{{ $product->id }}" disabled>
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                     <!-- <div class="product__item">
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
                    </div> -->
                    @endforeach
                    @else
                    <p>No featured products available.</p>
                @endif
                </div>
            </div>

            <div class="tab__item" content id="popular">
                <div class="products__container grid">
                @foreach($products as $product)
                <div class="product__item">
                        <div class="product__banner">
                            <a href="{{ route('product.show', $product->id) }}" class="product_images">
                                <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="Product Image" class="product__img default">
                                <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="ri-eye-line"></i>
                                </a>

                                <a href="" class="action__btn wishlist__btn" aria-label="Add to Wishlist" data-id="{{ $product->id }}">
                                    <i class="ri-heart-line"></i>
                                </a>

                                <!-- <a href="" class="action__btn" aria-label="Compare">
                                    <i class="ri-shuffle-line"></i>
                                </a> -->
                            </div>

                            <div class="product__badge light-pink">Hot</div>

                        </div>

                        <div class="product__content">
                            <span class="product__category">{{ $product->category->name }} </span>
                            <a href="{{ route('product.show', $product->id) }}">
                                <h3 class="product__title">{{ $product->name }}</h3>
                            </a>
                            <div class="product__rating">
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <div class="product__price flex-1">
                            @if($product->status == 'on_sale')
                                    <span class="new__price">NGN {{ number_format($product->sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($product->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($product->price) }}</span>
                                @endif
                            </div>

                            @if ($product->stock > 0)
                            <a href="" class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @else
                            <a href="" class="action__btn cart__btn btn-disabled" aria-label="Add To Cart" data-id="{{ $product->id }}" disabled>
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="product__item">
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
                    </div> -->
                    @endforeach
                </div>
            </div>

            <div class="tab__item" content id="new-added">
                <div class="products__container grid">
                @if(isset($newlyAddedProducts) && $newlyAddedProducts->count() > 0)
                @foreach ($newlyAddedProducts as $product)
                    <div class="product__item">
                        <div class="product__banner">
                        <a href="{{ route('product.show', $product->id) }}" class="product_images">
                            <img src="{{ asset('storage/' . $product->productImage->first()->image) }}" alt="Product Image" class="product__img default">
                            <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="" class="product__img hover">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="ri-eye-line"></i>
                                </a>

                                <a href="" class="action__btn wishlist__btn" aria-label="Add to Wishlist" data-id="{{ $product->id }}">
                                    <i class="ri-heart-line"></i>
                                </a>

                                <!-- <a href="" class="action__btn" aria-label="Compare">
                                    <i class="ri-shuffle-line"></i>
                                </a> -->
                            </div>

                            <div class="product__badge light-pink">Hot</div>

                        </div>

                        <div class="product__content">
                        <span class="product__category">{{ $product->category->name }} </span>
                        <a href="{{ route('product.show', $product->id) }}">
                               <h3 class="product__title">{{ $product->name }}</h3>
                            </a>
                            <div class="product__rating">
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <div class="product__price flex-1">
                            @if($product->status == 'on_sale')
                                    <span class="new__price">NGN {{ number_format($product->sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($product->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($product->price) }}</span>
                                @endif
                            </div>

                            @if ($product->stock > 0)
                            <a href="" class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @else
                            <a href="" class="action__btn cart__btn btn-disabled" aria-label="Add To Cart" data-id="{{ $product->id }}" disabled>
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="product__item">
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
                    </div> -->
                    @endforeach
                    @else
                    <p style="color: red;">No new products available.</p>
                @endif
                </div>
            </div>
        </div>

    </section>

    <section class="deals section">
        @if($sale)
        <div class="container banner">
            <h3>{{ $sale->name }}: </h3>
            <div id="countdown">
                <p id="countdown-text">
                </p>
            </div>
        </div>
        @else

        @endif
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
            @if(isset($newArrivalProducts) && $newArrivalProducts->count() > 0)
            @foreach ($newArrivalProducts as $product)
                <div class="product__item swiper-slide">
                    <div class="product__banner">
                        <a href="{{ route('product.show', $product->id) }}" class="product_images">
                            <img src="{{ asset('storage/' . $product->productImage->first()->image) }}" alt="Product Image" class="product__img default">
                            <img src="{{ asset('storage/' . $product->productImage->last()->image) }}" alt="" class="product__img hover">
                        </a>

                        <div class="product__actions">
                            <a href="" class="action__btn" aria-label="Quick View">
                                <i class="ri-eye-line"></i>
                            </a>

                            <a href="" class="action__btn wishlist__btn" aria-label="Add to Wishlist" data-id="{{ $product->id }}">
                                <i class="ri-heart-line"></i>
                            </a>

                            <!-- <a href="" class="action__btn" aria-label="Compare">
                                <i class="ri-shuffle-line"></i>
                            </a> -->
                        </div>

                        <div class="product__badge light-gold">New</div>

                    </div>

                    <div class="product__content">
                        <span class="product__category">{{ $product->category->name }} </span>
                        <a href="{{ route('product.show', $product->id) }}">
                               <h3 class="product__title">{{ $product->name }}</h3>
                        </a>
                        <div class="product__rating">
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                        </div>
                        <div class="product__price flex-1">
                        @if($product->status == 'on_sale')
                                    <span class="new__price">NGN {{ number_format($product->sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($product->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($product->price) }}</span>
                                @endif
                        </div>

                        @if ($product->stock > 0)
                        <a href="" class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                            <i class="ri-shopping-cart-2-line"></i>
                        </a>
                        @else
                        <a href="" class="action__btn cart__btn btn-disabled" aria-label="Add To Cart" data-id="{{ $product->id }}" disabled>
                            <i class="ri-shopping-cart-2-line"></i>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- <div class="product__item swiper-slide">
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
                </div> -->

                <!-- <div class="product__item swiper-slide">
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
                </div> -->

                <!-- <div class="product__item swiper-slide">
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
                </div> -->

                <!-- <div class="product__item swiper-slide">
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
                </div> -->

                <!-- <div class="product__item swiper-slide">
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
                </div> -->

                <!-- <div class="product__item swiper-slide">
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
                </div> -->
                @endforeach
                    @else
                    <p style="color: red;">No new products available.</p>
                @endif
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
@endsection

@push('scripts')
    @include('scripts.countdown')
@endpush
