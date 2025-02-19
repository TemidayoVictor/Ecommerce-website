@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

<section class="breadcrumb">
    <ul class="breadcrumb__list flex-1 container">
        <li><a href="" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Compare</span></li>
    </ul>
</section>

<section class="compare container section--lg">
    <table class="compare__table">
        <tr>
            <th>Image</th>
            <td>
                <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="compare__img">
            </td>

            <td>
                <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="compare__img">
            </td>

            <td>
                <img src="{{ asset('assets/product-8-2.jpg') }}" alt="" class="compare__img">
            </td>
        </tr>

        <tr>
            <th>Name</th>
            <td><h3 class="table__title">Plain Striola Shirt</h3></td>
            <td><h3 class="table__title">Plain Striola Shirt</h3></td>
            <td><h3 class="table__title">Plain Striola Shirt</h3></td>
        </tr>

        <tr>
            <th>Price</th>
            <td><span class="table__price">$35</span></td>
            <td><span class="table__price">$35</span></td>
            <td><span class="table__price">$35</span></td>
        </tr>

        <tr>
            <th></th>
            <td>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius suscipit provident nesciunt atque modi neque, illo natus facilis id sunt!</p>
            </td>
            <td>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius suscipit provident nesciunt atque modi neque, illo natus facilis id sunt!</p>
            </td>
            <td>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius suscipit provident nesciunt atque modi neque, illo natus facilis id sunt!</p>
            </td>
        </tr>

        <tr>
            <th>Colors</th>
            <td><ul class="color__list compare__colors">
            
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
                
            </ul></td>

            <td><ul class="color__list compare__colors">
            
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
                
            </ul></td>

            <td><ul class="color__list compare__colors">
            
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
                
            </ul></td>
        </tr>

        <tr>
            <th>Stock</th>
            <td><span class="table__stock">Out of Stock</span></td>
            <td><span class="table__stock">Out of Stock</span></td>
            <td><span class="table__stock">Out of Stock</span></td>
        </tr>

        <tr>
            <th>Weight</th>
            <td><span class="table__weight">150gram</span></td>
            <td><span class="table__weight">150gram</span></td>
            <td><span class="table__weight">150gram</span></td>
        </tr>

        <tr>
            <th>Dimensions</th>
            <td>
                <span class="table__dimension">N/A</span>
            </td>
            <td>
                <span class="table__dimension">N/A</span>
            </td>
            <td>
                <span class="table__dimension">N/A</span>
            </td>
        </tr>

        <tr>
            <th>Buy</th>
            <td><a href="" class="btn btn--sm">Add to Cart</a></td>
            <td><a href="" class="btn btn--sm">Add to Cart</a></td>
            <td><a href="" class="btn btn--sm">Add to Cart</a></td> 
        </tr>

        <tr>
            <th>Remove</th>
            <td><i class="ri-delete-bin-line table__trash"></i></td>
            <td><i class="ri-delete-bin-line table__trash"></i></td>
            <td><i class="ri-delete-bin-line table__trash"></i></td>
        </tr>

    </table>
</section>

@endsection