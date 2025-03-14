@extends('layouts.app')

@section('title')
    Shop
@endsection

@section('content')

    <section class="breadcrumb">
        <ul class="breadcrumb__list flex-1 container">
            <li><a href="" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Shop</span></li>
        </ul>
    </section>

    <section class="products section--lg container">

        <p class="total__products">We found <span>{{ $products->count() }}</span> items from you</p>

        <div class="products__container grid">
            @forelse($products as $product)
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

                            <a href="" class="action__btn wishlist__btn" data-id="{{ $product->id }}" aria-label="Add to Wishlist">
                                <i class="ri-heart-line"></i>
                            </a>

                            <a href="" class="action__btn" aria-label="Compare">
                                <i class="ri-shuffle-line"></i>
                            </a>
                        </div>

                        <div class="product__badge light-pink">Hot</div>

                    </div>

                    <div class="product__content">
                        <span class="product__category">{{ $product->category->name }}</span>
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
                            <span class="new__price">NGN {{ number_format($product->price) }}</span>
                            <span class="old__price">$245.8</span>
                        </div>

                        <button class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                            <i class="ri-shopping-cart-2-line"></i>
                        </button>
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
            @empty
            <div>
                <p>Sorry, we could not find any products</p>
            </div>

            @endforelse

        </div>

        {{-- <ul class="pagination">
            <li><a href="" class="pagination__link active">01</a></li>
            <li><a href="" class="pagination__link">02</a></li>
            <li><a href="" class="pagination__link">03</a></li>
            <li><a href="" class="pagination__link">...</a></li>
            <li><a href="" class="pagination__link">16</a></li>
            <li>
                <a href="" class="pagination__link icon">
                    <i class="ri-arrow-right-s-line"></i>
                </a>
            </li>
        </ul> --}}
    </section>

@endsection

