@extends('layouts.frontend-master')
@section('title')
    Shopmama E-com
@endsection

@section('frontend-content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Image</th>
                                        <th class="cart-description item">Name</th>
                                        <th class="cart-product-name item">Color</th>
                                        <th class="cart-edit item">Product Size</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-total last-item">Remove</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                                <span class="">
                                                    <a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
                                                        Shopping</a>
                                                    <a href="#"
                                                        class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                                                        shopping cart</a>
                                                </span>
                                            </div><!-- /.shopping-cart-btn -->
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody id="cartContent">

                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->



                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        @if(session()->has('coupon'))

                        @else
                        <div id="couponArea">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="couponName" class="form-control unicase-form-control text-input"
                                                    placeholder="You Coupon..">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" onclick="couponApply()" class="btn-upper btn btn-primary">APPLY
                                                    COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                        @endif


                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-6 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalculationArea">

                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('checkout.view') }}" class="btn btn-primary checkout-btn">PROCCED TO
                                                CHEKOUT</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->


                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.inc.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection
