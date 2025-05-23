@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

@php
    $cart = session('cart', []);
    $productQuantity = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 1;
@endphp
    
    <section class="breadcrumb">
        <ul class="breadcrumb__list flex-1 container">
            <li><a href="" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">{{ $product->category->name }}</span></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">{{ $product->name }} </span></li>
        </ul>
    </section>

    <section class="details section--lg">
        <div class="details__container container grid">
            <div class="details__group">
            @if($product->productImage->isNotEmpty())
                <img src="{{ asset('storage/' . $product->productImage->first()->image) }}" alt="{{ $product->name }}" class="details__img">
                @else
                <img src="{{ asset('assets/product-8-1.jpg') }}" alt="Default Product" class="details__img">
                @endif

                <div class="details__small-images grid">
                    @foreach($product->productImage as $image)
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $product->name }}" class="details__small-img">
                    @endforeach
                </div>  
            </div>

            <div class="details__group">
                <h3 class="details__title">{{ $product->name }}</h3>
                @if($product->brand)
                <p class="details__brand">Brands: <span>{{ $product->brand->name }}</span></p>
                @else
                <p class="product__brand">Brand: Not specified</p>
                @endif
                <span class="details__price flex-1">
                @if($product->status == 'on_sale')
                                    <span class="new__price">NGN {{ number_format($product->sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($product->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($product->price) }}</span>
                                @endif
                </span>
                <p class="short__description">
                {{ $product->description }}
                </p>

                <!-- <ul class="product__list">
                    <li class="list__item flex-1">
                        <i class="ri-vip-crown-line"></i>  1 year Aljazeerah Guarantee 
                    </li>
                    <li class="list__item flex-1">
                        <i class="ri-restart-line"></i> 30 Day return policy
                    </li>
                    <li class="list__item flex-1">
                        <i class="ri-bank-card-line"></i> Cash on Delivery available
                    </li>
                </ul> -->

                <!-- <div class="details__color flex-1">
                    <span class="details__color-title">Color</span>

                    <ul class="color__list">
                        <li>
                            <a href="" class="color__link" style="background-color: red"></a>
                        </li>

                        <li>
                            <a href="" class="color__link" style="background-color: blue"></a>
                        </li>

                        <li>
                            <a href="" class="color__link" style="background-color: green"></a>
                        </li>

                        <li>
                            <a href="" class="color__link" style="background-color: yellow"></a>
                        </li>
                    </ul>
                </div> -->

                <!-- <div class="details__size flex-1">
                    <span class="details__size-title">Size</span>

                    <ul class="size__list">
                        <li>
                            <a href="" class="size__link size-active">M</a>
                        </li>

                        <li>
                            <a href="" class="size__link">L</a>
                        </li>

                        <li>
                            <a href="" class="size__link">XXL</a>
                        </li>
                    </ul>
                </div> -->

                <div class="details__action">
                
                    <input type="number" name="quantity" value="{{ $productQuantity }}" min="1" class="quantity">

                    @if ($product->stock > 0)
                    <button href="" class="btn btn--sm add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                        Add To Cart
                    </button>
                    @else
                    <button class="btn btn--sm btn-disabled" disabled>
                        Out of stock
                    </button>
                @endif
                    <a href="" class="details__action-btn wishlist__btn" data-id="{{ $product->id }}">
                        <i class="ri-heart-line"></i>
                    </a>
                </div>

                <ul class="details__meta">
                    <!-- <li class="meta__list flex-1">  <span>SKU:</span> FWM15VKT</li> -->
                    <li class="meta__list flex-1">  <span>Category:</span>{{ $product->category->name }}</li>
                    @if($product->stock > 0)
                    <li class="meta__list flex-1">  <span>Availability:</span><b> {{ $product->stock }}</b> Items in Stock</li>
                    @else
                    <li class="meta__list flex-1">  <span>Availability:</span><b> Out of Stock</b></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>


    <!-- DETAILS TAB -->
    <section class="details__tab container swiper ">
        <div class="detail__tabs">
            <!-- <span class="detail__tab active-tab" data-target="#info">
                Additional Info
            </span> -->
            <span class="detail__tab active-tab" data-target="#reviews">
            Reviews({{ $product->reviews->where('approved', true)->count() }})
           </span>
        </div>

     <!--   <div class="details__tabs-content">
            <div class="details__tab-content active-tab" content id="info">
                <table class="info__table">
                    <tr>
                        <th>Stand Up</th>
                        <td>35"L x 24"W x37-45"H(front to back wheel)</td>
                    </tr>

                    <tr>
                        <th>Folded (w/o wheels)</th>
                        <td>35"L x 24"W x37-45"H</td>
                    </tr>  

                    <tr>
                        <th>Folded (w/ wheels)</th>
                        <td>35"L x 24"W x37-45"H</td>
                    </tr>

                    <tr>
                        <th>Door pass Through</th>
                        <td>24</td>
                    </tr>

                    <tr>
                        <th>Frame</th>
                        <td>Aluminium</td>
                    </tr>

                    <tr>
                        <th>Weight (tab wheels)</th>
                        <td>20 LBS </td>
                    </tr>

                    <tr>
                        <th>Weight Capacity</th>
                        <td>60 LBS</td>
                    </tr>

                    <tr>
                        <th>Width</th>
                        <td>24"</td>
                    </tr>

                    <tr>
                        <th>Handle height(ground to handle)</th>
                        <td>37-45"</td>
                    </tr>

                    <tr>
                        <th>Wheels</th>
                        <td>12" air / widee track slick tread</td>
                    </tr>

                    <tr>
                        <th>Seat back height</th>
                        <td>21.5"</td>
                    </tr>

                    <tr>
                        <th>Head room (inside canopy)</th>
                        <td>25"</td>
                    </tr>

                    <tr>
                        <th>Color</th>
                        <td>Black, Blue, Red, white</td>
                    </tr>

                    <tr>
                        <th>Size</th>
                        <td>M, S </td>
                    </tr>
                </table>
            </div> -->

            <div class="details__tab-content active-tab"  content id="reviews">
                <div class="reviews__container grid">
                    @if ($product)
                @if ($product->reviews->where('approved', true)->count() > 0)
                @foreach ($product->reviews->where('approved', true) as $review)
                    <div class="review__single">
                        <div>
                            <!-- <img src="{{ asset('assets/avatar-1.jpg') }}" alt="" class="review__img"> -->
                            <h4 class="review__title">{{ $review->user->name }}</h4>
                        </div>

                        <div class="review__data">
                            <div class="review__rating">
                                <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->average_rating)
                                        <i class="ri-star-fill" style="color: gold;"></i> <!-- Filled Star -->
                                    @else
                                        <i class="ri-star-line" style="color: gray;"></i> <!-- Empty Star -->
                                    @endif
                                @endfor
                            </div>
                            </div>

                            <p class="review__description">
                            {{ $review->review }}
                            </p>

                            <!-- <span class="review__date">December 4, 2020 at 3:12 pm</span> -->
                        </div>
                    </div>

                    <!-- <div class="review__single">
                        <div>
                            <img src="{{ asset('assets/avatar-2.jpg') }}" alt="" class="review__img">
                            <h4 class="review__title">Jacky Chan</h4>
                        </div>

                        <div class="review__data">
                            <div class="review__rating">
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                            </div>

                            <p class="review__description">
                                Great low price and works well.
                            </p>

                            <span class="review__date">December 4, 2020 at 3:12 pm</span>
                        </div>
                    </div>   

                    <div class="review__single">
                        <div>
                            <img src="{{ asset('assets/avatar-3.jpg') }}" alt="" class="review__img">
                            <h4 class="review__title">Jacky Chan</h4>
                        </div>

                        <div class="review__data">
                            <div class="review__rating">
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                            </div>

                            <p class="review__description">
                                Authentic and Beautiful, Love this way more than ever expected.
                            </p>

                            <span class="review__date">December 4, 2020 at 3:12 pm</span>
                        </div>
                    </div> -->
                    @endforeach
                    @else
                    <p>No reviews yet.</p>
                    @endif
                    @else
                    <p>Product not found</p>
                    @endif
                </div>
            

                <div class="review_form">
                @auth
                    <h4 class="reivew__form-title">Add a review</h4>
                    <form action="{{ route('review.store', $product->id) }}" class="form grid" method="POST">
                  @csrf

                 <div class="rate__product rating">

                    <input type="radio" name="rating" value="1" id="star1">
                    <label for="star1"><i class="ri-star-line" style="color: gold;"></i></label>

                    <input type="radio" name="rating" value="2" id="star2">
                    <label for="star2"><i class="ri-star-line" style="color: gold;"></i></label>

                    <input type="radio" name="rating" value="3" id="star3">
                    <label for="star3"><i class="ri-star-line" style="color: gold;"></i></label>

                    <input type="radio" name="rating" value="4" id="star4">
                    <label for="star4"><i class="ri-star-line" style="color: gold;"></i></label>

                    <input type="radio" name="rating" value="5" id="star5">
                    <label for="star5"><i class="ri-star-line" style="color: gold;"></i></label>

                  </div>

                  
                    <textarea name="review" class="form__input textarea" placeholder="Write Comment" required>
                        
                    </textarea>

                    <!-- <div class="form__group grid">
                        <input type="text" placeholder="Name" class="form__input"/>

                        <input type="email" placeholder="Email" class="form__input"/>
                    </div> -->

                    <div class="form__btn">
                        <button class="btn" type="submit">Submit Review</button>
                    </div>
                  </form>
                  @else
                <p><b><a style="color: #2E7D32;" href="{{ route('login') }}">Login</a></b> to write a review.</p>
                @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED PRODUCTS -->
     <section class="products container section--lg">
        <h3 class="section__title"><span>Related</span> Products</h3>

        <div class="products__container grid">
        @foreach ($relatedProducts as $related)
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="{{ route('product.show', $related->id) }}" class="product_images">
                                <img src="{{ asset('storage/' . ($related->productImage->last()->image ?? 'default.png')) }}" 
                         alt="{{ $related->name }}" class="product__img default">
                                <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="product__img hover">
                            </a>

                            <div class="product__actions">
                                <a href="" class="action__btn" aria-label="Quick View">
                                    <i class="ri-eye-line"></i>
                                </a>

                                <a href="" class="action__btn wishlist__btn" data-id="{{ $product->id }}" aria-label="Add to Wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>

                                <!-- <a href="" class="action__btn" aria-label="Compare">
                                    <i class="ri-shuffle-line"></i>
                                </a> -->
                            </div>

                            <div class="product__badge light-blue">Hot</div>

                        </div>

                        <div class="product__content">
                            <span class="product__category">Clothing</span>
                            <a href="">
                                <h3 class="product__title">{{ $related->name }}</h3>
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
                                    <span class="new__price">NGN {{ number_format($related>sales) }}</span>
                                    <span class="old__price">NGN {{ number_format($related->price) }}</span>
                                @else
                                    <span class="new__price">NGN {{ number_format($related->price) }}</span>
                                @endif
                            </div>
                            @if ($related->stock > 0)
                            <a href="" class="action__btn cart__btn add__btn" aria-label="Add To Cart" data-id="{{ $product->id }}">
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
                            @else
                            <button class="btn btn--sm btn-disabled" disabled>
                                Out of stock
                            </button>
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
     </section>
    
@endsection