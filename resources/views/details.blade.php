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

@endsection