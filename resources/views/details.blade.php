@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')
    
    <section class="breadcrumb">
        <ul class="breadcrumb__list flex-1 container">
            <li><a href="" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Fashion</span></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Henley Shirt</span></li>
        </ul>
    </section>

    <section class="details section--lg">
        <div class="details__container container grid">
            <div class="details__group">
                <img src="{{ asset('assets/product-8-1.jpg') }}" alt="" class="details__img">

                <div class="details__small-images grid">
                    <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="details__small-img">
                    <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="details__small-img">
                    <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="details__small-img">
                </div>
            </div>

            <div class="details__group">
                <h3 class="details__title">Henley Shirt</h3>
                <p class="details__brand">Brands: <span>Addidas</span></p>
                <span class="details__price flex-1">
                    <span class="new__price">$116</span>
                    <span class="old__price">$200</span>
                    <span class="save__price">25% off</span>
                </span>
                <p class="short__description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, aliquid! Reprehenderit odio minus esse quasi praesentium quod laborum ab assumenda.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, aliquid! Reprehenderit odio minus esse quasi praesentium quod laborum ab assumenda.
                </p>

                <ul class="product__list">
                    <li class="list__item flex-1">
                        <i class="ri-vip-crown-line"></i>  1 year Aljazeerah Guarantee 
                    </li>
                    <li class="list__item flex-1">
                        <i class="ri-restart-line"></i> 30 Day return policy
                    </li>
                    <li class="list__item flex-1">
                        <i class="ri-bank-card-line"></i> Cash on Delivery available
                    </li>
                </ul>

                <div class="details__color flex-1">
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
                </div>

                <div class="details__size flex-1">
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
                </div>

                <div class="details__action">
                    <input type="number" class="quantity" value="3">
                    <a href="" class="btn btn--sm">Add To Cart</a>
                    <a href="" class="details__action-btn">
                        <i class="ri-heart-line"></i>
                    </a>
                </div>

                <ul class="details__meta">
                    <li class="meta__list flex-1">  <span>SKU:</span> FWM15VKT</li>
                    <li class="meta__list flex-1">  <span>Tags:</span> Clothes, Men</li>
                    <li class="meta__list flex-1">  <span>Availability:</span> 8 Items in Stock</li>
                </ul>
            </div>
        </div>
    </section>


    <!-- DETAILS TAB -->
    <section class="details__tab container swiper ">
        <div class="detail__tabs">
            <span class="detail__tab active-tab" data-target="#info">
                Additional Info
            </span>
            <span class="detail__tab" data-target="#reviews">
            Reviews(3)
           </span>
        </div>

        <div class="details__tabs-content">
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
            </div>

            <div class="details__tab-content"  content id="reviews">
                <div class="reviews__container grid">
                    <div class="review__single">
                        <div>
                            <img src="{{ asset('assets/avatar-1.jpg') }}" alt="" class="review__img">
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
                                Thank you very fast shipping from Poland only 3 days.
                            </p>

                            <span class="review__date">December 4, 2020 at 3:12 pm</span>
                        </div>
                    </div>

                    <div class="review__single">
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
                    </div>
                </div>

                <div class="review_form">
                    <h4 class="reivew__form-title">Add a review</h4>

                 <div class="rate__product">
                        <i class="ri-star-line"></i>
                        <i class="ri-star-line"></i>
                        <i class="ri-star-line"></i>
                        <i class="ri-star-line"></i>
                        <i class="ri-star-line"></i>
                  </div>

                  <form action="" class="form grid">
                    <textarea class="form__input textarea" placeholder="Write Comment">
                        
                    </textarea>

                    <div class="form__group grid">
                        <input type="text" placeholder="Name" class="form__input"/>

                        <input type="email" placeholder="Email" class="form__input"/>
                    </div>

                    <div class="form__btn">
                        <button class="btn">Submit Review</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED PRODUCTS -->
     <section class="products container section--lg">
        <h3 class="section__title"><span>Related</span> Products</h3>

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
     </section>
    
@endsection