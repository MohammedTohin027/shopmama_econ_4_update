<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">
            @if (session()->get('language') == 'bangla')
                নতুন পণ্যসমূহ
            @else
                New Products
            @endif
        </h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if (session()->get('language') == 'bangla') সকল @else All @endif</a>
            </li>

            @foreach ($pub_linit_categories as $item)
                <li>
                    @if (session()->get('language') == 'bangla')
                    <a data-transition-type="backSlide" href="#category-{{ $item->id }}"
                        data-toggle="tab">{{ $item->category_name_bn }}
                    </a>
                    @else
                    <a data-transition-type="backSlide" href="#category-{{ $item->id }}"
                        data-toggle="tab">{{ $item->category_name_en }}
                    </a>
                    @endif
                </li>
            @endforeach

        </ul><!-- /.nav-tabs -->
    </div>

    <div class="tab-content outer-top-xs">

        <div class="tab-pane in active" id="all">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                    @foreach ($all_new_pub_products as $item)

                        <div class="item item-carousel">
                            <div class="products">

                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="detail.html"><img src="{{ asset($item->product_thambnail) }}"
                                                    alt="" style="height:200px; width:180px"></a>
                                        </div><!-- /.image -->
{{-- @php
    $amount = $item->selling_price - $item->discount_price
    $discount = ($amount / $item->selling_price) * 100
    @if($item->discount_price == null)
     @else {{ round($discount) }} @endif
@endphp --}}
                                        <div class="tag {{ $item->sale_tag }}"><span> {{ $item->sale_tag }}</span>
                                        </div>
                                    </div><!-- /.product-image -->


                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            @if (session()->get('language') == 'bangla')
                                                <a href="detail.html">{{ $item->product_name_bn }}</a>
                                            @else
                                                <a href="detail.html">{{ $item->product_name_en }}</a>
                                            @endif
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
                                            <span class="price">
                                                @if ($item->discount_price == null)
                                                    {{ $item->selling_price }}
                                                @else
                                                    {{ $item->discount_price }}
                                                @endif
                                            </span>
                                            <span class="price-before-discount">
                                                @if ($item->discount_price == null)

                                                @else
                                                    {{ $item->selling_price }}
                                                @endif

                                            </span>

                                        </div><!-- /.product-price -->

                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon"
                                                        type="button" title="Add Cart" id="{{ $item->id }}" data-toggle="modal" data-target="#cartModel" onclick="productView(this.id)">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>

                                                </li>

                                                <li class="lnk wishlist">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                                                        title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                                                        title="Compare">
                                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->

                            </div><!-- /.products -->
                        </div><!-- /.item -->

                    @endforeach

                </div><!-- /.home-owl-carousel -->
            </div><!-- /.product-slider -->
        </div><!-- /.tab-pane -->

        @foreach ($all_pub_categories as $category)
            <div class="tab-pane" id="category-{{ $category->id }}">
                <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                        @php
                            $products = App\Models\Product::where('category_id', $category->id)
                                ->where('status', 1)
                                ->orderBy('id', 'DESC')
                                ->get();
                        @endphp
                        @forelse($products as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img
                                                        src="{{ asset($product->product_thambnail) }}" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag {{ $product->sale_tag }}">
                                                <span>{{ $product->sale_tag }}</span>
                                            </div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if (session()->get('language') == 'bangla')
                                                    <a href="detail.html">{{ $product->product_name_bn }}</a>
                                                @else
                                                    <a href="detail.html">{{ $product->product_name_en }}</a>
                                                @endif

                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
                                                <span class="price">
                                                    @if ($product->discount_price == null)
                                                        {{ $product->selling_price }}
                                                    @else
                                                        {{ $product->discount_price }}
                                                    @endif
                                                </span>
                                                <span class="price-before-discount">
                                                    @if ($product->discount_price == null)

                                                    @else
                                                        {{ $product->selling_price }}
                                                    @endif
                                                </span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @empty
                            @if (session()->get('language') == 'bangla')
                                <span class="text-danger"
                                    style="font-size: 12px; font-weight:bold; text-align:center">পণ্য খুঁজে পাওয়া যায়
                                    নি</span>
                            @else
                                <span class="text-danger"
                                    style="font-size: 12px; font-weight:bold; text-align:center">Product Not
                                    Found</span>
                            @endif
                        @endforelse
                    </div><!-- /.home-owl-carousel -->
                </div><!-- /.product-slider -->
            </div><!-- /.tab-pane -->
        @endforeach
    </div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
