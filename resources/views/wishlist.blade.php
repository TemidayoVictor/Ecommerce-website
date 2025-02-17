@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

<section class="breadcrumb">
        <ul class="breadcrumb__list flex-1 container">
            <li><a href="" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Shop</span></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Wishlist</span></li>
        </ul>
    </section>
     
<!-- WISHLIST -->
<section class="wishlist section--lg container">
<div class="table__container">
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th>Action</th>
                    <th>Remove</th>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-1-2.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><span class="table__stock">In Stock</span></td>

                    <td><a href="" class="btn btn btn--sm">Add to cart</a></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-7-1.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><span class="table__stock">In Stock</span></td>

                    <td><a href="" class="btn btn btn--sm">Add to cart</a></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('assets/product-2-1.jpg') }}" alt="" class="table__img">
                    </td>

                    <td>
                        <h3 class="table__title">J-crew Mercantile womens short sleeve</h3>
                        <p class="table__description">
                            Maboriosam in a tonto nesciung eget distingy.
                        </p>
                    </td>

                    <td><span class="table__price">$110</span></td>

                    <td><span class="table__stock">In Stock</span></td>

                    <td><a href="" class="btn btn btn--sm">Add to cart</a></td>

                    <td><i class="ri-delete-bin-line table__trash"></i></td>
                </tr>
            </table>
        </div>
</section>

@endsection