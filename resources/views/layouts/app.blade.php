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
        
        {{-- fontawesome kit --}}
        <script src="https://kit.fontawesome.com/23bcbedea7.js" crossorigin="anonymous"></script>
        <title>E Commerce Website || @yield('title')</title>
    </head>
    <body>

        <div id="page" class="site">

            <aside class="site-off desktop-hide">
                <div class="off-canvas">
                    <div class="canvas-head">
                        <div class="logo"> <a href=""> <span class="circle"></span>.store</a> </div>
                        <a href="" class="t-close flexcenter"><i class="ri-close-line"></i></a>
                    </div>
                    <div class="departments"></div>
                    <nav></nav>
                    <div class="thetop-nav"></div>
                </div>
            </aside>

            <header>
                <div class="header-top mobile-hide">
                    <div class="container">
                        <div class="wrapper flexitem">
                            <div class="left">
                                <ul class="flexitem main-links">
                                    <li><a href="">Blog</a></li>
                                    <li><a href="">Featured Products</a></li>
                                    <li><a href="">Wishlist</a></li>
                                </ul>
                            </div>

                            <div class="right">
                                <ul class="flexitem">
                                    <li class="main-links">
                                        <li><a href="">Sign up</a></li>
                                        <li><a href="">My Account</a></li>
                                        <li><a href="">Order Tracking</a></li>
                                        <li><a href="">USD <span class="icon-small"> <i class="ri-arrow-down-s-line"></i> </span> </a>
                                            <ul>
                                                <li class="current"><a href="">USD</a></li>
                                                <li><a href="">EURO</a></li>
                                                <li><a href="">GBP</a></li>
                                                <li><a href="">IDR</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="">English <span class="icon-small"> <i class="ri-arrow-down-s-line"></i> </span> </a>
                                            <ul>
                                                <li class="current"><a href="">English</a></li>
                                                <li><a href="">French</a></li>
                                            </ul>
                                        </li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Header Top Ends --}}

                <div class="header-nav">
                    <div class="container">
                        <div class="wrapper flexitem">
                            <a href="" class="trigger desktop-hide"> <span class="ri-menu-2-line"></span></a>
                            <div class="left flexitem">
                                <div class="logo"> <a href=""> <span class="circle"></span>.store</a> </div>
                                <nav class="mobile-hide">
                                    <ul class="flexitem second-links">
                                        <li><a href="">Home</a></li>
                                        <li><a href="">Shop</a></li>
                                        <li><a href="">Men</a></li>
                                        <li class="has-child">
                                            <a href="">Women
                                                <div class="icon-small"> <i class="ri-arrow-down-s-line"></i> </div>
                                            </a>
                                            <div class="mega">
                                                <div class="container">
                                                    <div class="wrapper">
                                                        <div class="flexcol">
                                                            <div class="row">
                                                                <h4>Women's Clothing</h4>
                                                                <ul>
                                                                    <li><a href="">Dresses</a></li>
                                                                    <li><a href="">Jackets and Coats</a></li>
                                                                    <li><a href="">Sweaters</a></li>
                                                                    <li><a href="">Costumes</a></li>
                                                                    <li><a href="">Pyjamas and Robes</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="flexcol">
                                                            <div class="row">
                                                                <h4>Women's Clothing</h4>
                                                                <ul>
                                                                    <li><a href="">Dresses</a></li>
                                                                    <li><a href="">Jackets and Coats</a></li>
                                                                    <li><a href="">Sweaters</a></li>
                                                                    <li><a href="">Costumes</a></li>
                                                                    <li><a href="">Pyjamas and Robes</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="flexcol">
                                                            <div class="row">
                                                                <h4>Women's Clothing</h4>
                                                                <ul>
                                                                    <li><a href="">Dresses</a></li>
                                                                    <li><a href="">Jackets and Coats</a></li>
                                                                    <li><a href="">Sweaters</a></li>
                                                                    <li><a href="">Costumes</a></li>
                                                                    <li><a href="">Pyjamas and Robes</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="flexcol">
                                                            <div class="row">
                                                                <h4>Women's Clothing</h4>
                                                                <ul class="brands">
                                                                    <li><a href="">Dresses</a></li>
                                                                    <li><a href="">Jackets and Coats</a></li>
                                                                    <li><a href="">Sweaters</a></li>
                                                                    <li><a href="">Costumes</a></li>
                                                                    <li><a href="">Pyjamas and Robes</a></li>
                                                                </ul>
                                                                <a href="" class="view-all">View all Brands <i class="ri-arrow-right-line"></i> </a>
                                                            </div>
                                                        </div>

                                                        <div class="flexcol products">
                                                            <div class="row">
                                                                <div class="media">
                                                                    <div class="thumbnail object-cover">
                                                                        <a href="#">
                                                                            <img src="{{ asset ('assets/products/apparel4.jpg')}}" alt="" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="text-content">
                                                                    <h4>Most Wanted</h4>
                                                                    <a href="" class="primary-button">Order Now</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="">Sports
                                                <div class="fly-item"> <span>New!</span> </div>
                                            </a>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="right">
                                <ul class="flexitem second-links">
                                    <li class="mobile-hide">
                                        <a href="">
                                            <div class="icon-large"> <i class="ri-heart-line"></i> </div>
                                            <div class="fly-item"> <span class="item-number">0</span> </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"> <i class="ri-shopping-cart-line"></i> </div>
                                            <div class="fly-item"> <span class="item-number">0</span> </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="iscart">
                                            <div class="icon-text">
                                                <div class="mini-text">Total</div>
                                                <div class="cart-total">$0.00</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-main mobile-hide">
                    <div class="container">
                        <div class="wrapper flexitem">
                            <div class="left">
                                <div class="dpt-cat">
                                    <div class="dpt-head">
                                        <div class="main-text">All Departments</div>
                                        <div class="mini-text mobile-hide">Total Products</div>
                                        <a href="" class="dpt-trigger mobile-hide">
                                            <i class="ri-menu-3-line ri-xl"></i>
                                        </a>
                                    </div>

                                    <div class="dpt-menu">
                                        <ul class="second-links">
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                                <ul style="background-image: url({{ asset ('assets/menu/menu_bg1.jpg')}})">
                                                    <li>
                                                        <a href="">Make Up</a>
                                                        <a href="">Skin Care</a>
                                                        <a href="">Hair Care</a>
                                                        <a href="">Fragrance</a>
                                                        <a href="">Personal Care</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                                <ul style="background-image: url({{ asset ('assets/menu/menu_bg1.jpg')}})">
                                                    <li>
                                                        <a href="">Make Up 2</a>
                                                        <a href="">Skin Care</a>
                                                        <a href="">Hair Care</a>
                                                        <a href="">Fragrance</a>
                                                        <a href="">Personal Care</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-child homekit">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                                <div class="mega" style="background-image: url({{ asset ('assets/menu/menu_bg2.jpg')}})">
                                                    <div class="flexcol">
                                                        <div class="row">
                                                            <h4><a href=""></a>Kitchen and Dining</h4>
                                                            <ul>
                                                                <li>
                                                                    <a href="">Make Up</a>
                                                                    <a href="">Skin Care</a>
                                                                    <a href="">Hair Care</a>
                                                                    <a href="">Fragrance</a>
                                                                    <a href="">Personal Care</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="row">
                                                            <h4><a href=""></a>Kitchen and Dining</h4>
                                                            <ul>
                                                                <li>
                                                                    <a href="">Make Up</a>
                                                                    <a href="">Skin Care</a>
                                                                    <a href="">Hair Care</a>
                                                                    <a href="">Fragrance</a>
                                                                    <a href="">Personal Care</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                            <li class="has-child fashion">
                                                <a href="">
                                                    <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                                    Beauty
                                                    <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="right">
                                <div class="search-box">
                                    <form action="" class="search">
                                        <span class="icon-large"><i class="ri-search-line"></i></span>
                                        <input type="search" placeholder="search for products">
                                        <button type="submit"> Search </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </header>
            
            <main>
                @yield('content')
            </main>
            
            <footer>

            </footer>
        </div>
        
        <script src=" {{ asset('js/script.js') }} "></script>

    </body>
</html>