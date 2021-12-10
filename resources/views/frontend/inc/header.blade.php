<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-heart"></i>@if (session()->get('language') == 'bangla') পছন্দ তালিকা @else Wishlist @endif</a></li>
                        <li><a href="{{ route('cart.page.view') }}"><i class="icon fa fa-shopping-cart"></i>@if (session()->get('language') == 'bangla') আমার কার্ট @else My Cart @endif</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>@if (session()->get('language') == 'bangla') চেক আউট @else Checkout @endif</a></li>
                        <li>
                            @auth
                                <a href="{{ route('user.dashboard') }}"><i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'bangla') প্রোফাইল @else Profile @endif
                                </a>
                            @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i> @if (session()->get('language') == 'bangla') লগ-ইন / রেজিস্টার @else Login/Register @endif
                                </a>
                            @endauth

                        </li>
                    </ul>
                </div><!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span
                                    class="value">
                                    @if (session()->get('language') == 'bangla') ভাষা পরিবর্তন করুন @else Language @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'bangla')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                                @endif

                            </ul>
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">

                            <img src="{{ asset('frontend') }}/assets/images/logo.png" alt="">

                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>

                                        </ul>
                                    </li>
                                </ul>

                                <input class="search-field" placeholder="Search here..." />

                                <a class="search-button" href="#"></a>

                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><span id="cartQty" class="count"></span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
                                        <span class="sign">$</span><span id="cartTotal"
                                            class="value"></span>
                                    </span>
                                </div>


                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="miniCart">

                                </div>

                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Sub Total :</span><span id="cartTotal"
                                            class='price'></span>

                                    </div>
                                    <div class="clearfix"></div>

                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div><!-- /.cart-total-->


                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown">
                                        @if (session()->get('language') == 'bangla')
                                            হোম
                                        @else
                                            Home
                                        @endif
                                    </a>

                                </li>


                                <li class="dropdown mega-menu">
                                    <a href="category.html" data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown">Electronics
                                        <span class="menu-label hot-menu hidden-xs">hot</span>
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Laptops</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Gaming</a></li>
                                                            <li><a href="#">Laptop Skins</a></li>
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">Dell</a></li>
                                                            <li><a href="#">Lenovo</a></li>
                                                            <li><a href="#">Microsoft</a></li>
                                                            <li><a href="#">Asus</a></li>
                                                            <li><a href="#">Adapters</a></li>
                                                            <li><a href="#">Batteries</a></li>
                                                            <li><a href="#">Cooling Pads</a></li>
                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Desktops</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Routers & Modems</a></li>
                                                            <li><a href="#">CPUs, Processors</a></li>
                                                            <li><a href="#">PC Gaming Store</a></li>
                                                            <li><a href="#">Graphics Cards</a></li>
                                                            <li><a href="#">Components</a></li>
                                                            <li><a href="#">Webcam</a></li>
                                                            <li><a href="#">Memory (RAM)</a></li>
                                                            <li><a href="#">Motherboards</a></li>
                                                            <li><a href="#">Keyboards</a></li>
                                                            <li><a href="#">Headphones</a></li>
                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Cameras</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Binoculars</a></li>
                                                            <li><a href="#">Telescopes</a></li>
                                                            <li><a href="#">Camcorders</a></li>
                                                            <li><a href="#">Digital</a></li>
                                                            <li><a href="#">Film Cameras</a></li>
                                                            <li><a href="#">Flashes</a></li>
                                                            <li><a href="#">Lenses</a></li>
                                                            <li><a href="#">Surveillance</a></li>
                                                            <li><a href="#">Tripods</a></li>

                                                        </ul>
                                                    </div><!-- /.col -->
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Mobile Phones</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">Samsung</a></li>
                                                            <li><a href="#">Lenovo</a></li>
                                                            <li><a href="#">Motorola</a></li>
                                                            <li><a href="#">LeEco</a></li>
                                                            <li><a href="#">Asus</a></li>
                                                            <li><a href="#">Acer</a></li>
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Headphones</a></li>
                                                            <li><a href="#">Memory Cards</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                        <a href="#"><img alt=""
                                                                src="{{ asset('frontend') }}/assets/images/banners/banner-side.png"></a>
                                                    </div>
                                                </div><!-- /.row -->
                                            </div><!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="contact.html">Shoes</a>
                                </li>

                                <li class="dropdown  navbar-right special-menu">
                                    <a href="#">Todays offer</a>
                                </li>


                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
