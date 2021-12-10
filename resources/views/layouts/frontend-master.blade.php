<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-select.min.css">

    {{-- toaster message --}}
    <link rel="stylesheet" href="{{ asset('common/toastr/toastr.css') }}">




    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.inc.header')

    <!-- ============================================== HEADER : END ============================================== -->

    @yield('frontend-content')




    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.inc.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModel" tabindex="-1" aria-labelledby="cartModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModel"> <strong id="p_name"></strong> </h5>
                    <button type="button" class="close" id="closeModel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card" style="width:16rem">
                                <img src="" id="p_image" class="cart-img-top" alt=""
                                    style="height:215px; width:180px">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong id="new_price"
                                        class="text-danger"></strong> <del><small id="old_price"></small></del></li>
                                <li class="list-group-item">Product Code: <strong id="p_code"></strong> </li>
                                <li class="list-group-item">Category: <strong id="p_category"></strong></li>
                                <li class="list-group-item">Brand: <strong id="p_brand"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span id="p_aviable" class="badge badge-pill"
                                        style="color:white; background:green"></span>
                                    <span id="p_stockout" class="badge badge-pill"
                                        style="color: white; background:red"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="colorArea">
                                <label for="color">Select Color</label>
                                <select id="color" class="form-control" name="color">
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Select Size</label>
                                <select id="size" class="form-control" name="size">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Qunatity</label>
                                <input type="number" class="form-control" name="" id="quantity" value="1" min="1">
                            </div>
                            <input type="hidden" id="p_id" value="">
                            <button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- For demo purposes – can be removed on production -->


    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend') }}/assets/js/jquery-1.11.1.min.js"></script>

    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>

    <script src="{{ asset('frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>

    <script src="{{ asset('frontend') }}/assets/js/echo.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/assets/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('common/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('common/sweetalert/sweetalert2@8.js') }}"></script>
    <script src="{{ asset('common/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate({
            lang: 'en'
        });
    </script>

    {{-- toaster message start --}}
    <script>
        @if (Session::has('message'))
            var type ="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>
    {{-- toaster message end --}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        //  Product View for Model
        function productView(id) {
            $.ajax({
                type: 'GET',
                url: 'product/view/model/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#p_id').val(data.product.id);
                    $('#quantity').val(1);
                    $('#p_name').text(data.product.product_name_en);
                    if (data.product.discount_price == null) {
                        $('#new_price').text(data.product.selling_price);
                        $('#old_price').text('');
                    } else {
                        $('#new_price').text(data.product.discount_price);
                        $('#old_price').text(data.product.selling_price);
                    }
                    $('#p_code').text(data.product.product_code);
                    $('#p_category').text(data.product.category.category_name_en);
                    $('#p_brand').text(data.product.brand.brand_name_en);

                    if (data.product.product_qty > 0) {
                        $('#p_stockout').text('');
                        $('#p_aviable').text("aviable");
                    } else {
                        $('#p_aviable').text('');
                        $('#p_stockout').text("stockout");
                    }
                    $('#p_image').attr('src', '/' + data.product.product_thambnail);
                    // $('#p_image').attr('src','/laravel_8/shopmama_econ_4/public/' + data.product.product_thambnail);
                    //  Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value +
                            '</option>')
                        if (data.color == null || data.color == '') {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    });
                    //  Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value"' + value + '">' + value +
                            '</option>')
                        if (data.size == '' || data.size == null) {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    });
                }
            })
        }

        //  Product View for Model end


        //  Add to Cart Product start
        function addToCart() {
            var id = $('#p_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#quantity').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    $('#closeModel').click();
                    miniCartProductShow();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            })
        }
        //  Add to Cart Product end
    </script>
    <script>
        //  Minicart Product Show start
        function miniCartProductShow() {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/view',
                dataType: 'json',
                success: function(response) {
                    $('#cartQty').text(response.cartQty);
                    $('span[id="cartTotal"]').text(response.cartTotal);

                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img
                                                            src="/${value.options.image}"
                                                            alt="" style="height:45px"></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple
                                                        Product</a></h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(id)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>`
                    });
                    $('#miniCart').html(miniCart);
                },
            })
        }
        miniCartProductShow();
        //  Minicart Product Show end

        //  miniCart Product Remove start
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/' + rowId,
                data: {
                    id: rowId,
                },
                success: function(data) {
                    miniCartProductShow();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                },

            });
        }
        //  miniCart Product Remove end
    </script>

    <script>
        //  Cartpage product view
        function cartProductView() {
            $.ajax({
                type: 'GET',
                url: '/get/cart/product',
                dataType: 'json',
                success: function(response) {
                    var cartContentview = ""
                    $.each(response.carts, function(key, value) {
                        cartContentview += `<tr>
                                        <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="height:60px; width:60px;"></td>
                                        <td class="col-md-2">
                                            <div class="product-name"><strong>${value.name}</strong></div>
                                            <strong>${value.price}</strong>
                                        </td>
                                        <td class="col-md-2">
                                            ${value.options.color == null ?
                                                `<span style="font-size:15px; font-weight:bold">..........</span>` :
                                                `<strong>${value.options.color}</strong>`
                                            }
                                        </td>
                                        <td class="col-md-2">
                                            ${value.options.size == null ?
                                                `<span style="font-size:15px; font-weight:bold">..........</span>` :
                                                `<strong>${value.options.size}</strong>`
                                            }
                                        </td>

                                        <td class="col-md-2">
                                            ${value.qty > 1 ?
                                                `<button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>` :
                                                `<button type="submit" class="btn btn-success btn-sm" disabled>-</button>`
                                            }
                                            <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                                            <button type="submit" id="${value.rowId}" onclick="increment(this.id)" class="btn btn-danger btn-sm">+</button>
                                        </td>

                                        <td class="col-md-1">
                                            <strong>${value.price * value.qty}</strong>
                                        </td>

                                        <td class="col-md-1 close-btn">
                                            <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)" ><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>`
                    });
                    $('#cartContent').html(cartContentview);


                    console.log(response);
                },
            });
        }
        cartProductView();
        //  Cart Increment
        function increment(id) {
            $.ajax({
                type: 'GET',
                url: '/cart-increment/' + id,
                dataType: 'json',
                success: function(data) {
                    miniCartProductShow();
                    cartProductView();
                    couponCalculation();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data);
                }
            })
        }
        //  Cart Remove
        function cartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCartProductShow();
                    cartProductView();
                    couponCalculation();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data);
                }
            })
        }

        //  Cart Decrement
        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart-decrement/' + rowId,
                dataType: 'json',
                success: function(data) {
                    cartProductView();
                    miniCartProductShow();
                    couponCalculation();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    // console.log(data);
                },
            });

        }
    </script>

    <script>
        //  coupon apply
        function couponApply() {
            var coupon_name = $('#couponName').val();
            // alert(coupon_name);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: '/coupon-apply',
                success: function(data) {
                    couponCalculation();
                    $('#couponName').val('')
                    $('#couponArea').hide();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        $('#couponName').val('')
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data);
                }
            });
        }
        //  Coupon Calculation
        function couponCalculation() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/coupon-calculation',
                success: function(data) {
                    // var couponCalculationArea = "";

                    // couponCalculationArea += ``
                    if (data.total) {
                        $('#couponCalculationArea').html(`<tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">${data.total}</span>
                                        </div>

                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">${data.total}</span>
                                        </div>

                                    </th>
                                </tr>`);

                    }
                    else{
                        $('#couponCalculationArea').html(`<tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">${data.sub_total}</span>
                                        </div>
                                        <div class="cart-sub-total">
                                            Coupon<span class="inner-left-md">${data.coupon_name}</span>
                                            <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                                        </div>
                                        <div class="cart-sub-total">
                                            Discount Amount<span class="inner-left-md">${data.discount_amount}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">${data.total_amount}</span>
                                        </div>

                                    </th>
                                </tr>`)

                    }
                },
            });
        }
        couponCalculation();

        //  Coupon Remove
        function couponRemove() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/coupon-remove',
                success: function(data) {
                    couponCalculation();
                    $('#couponArea').show();
                    $('#couponName').val('')
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            })
        }
    </script>



</body>

  <!-- If you want to use the popup integration, -->
  <script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();
    obj.post_code = $('#post_code').val();
    obj.division_id = $('#division_id').val();
    obj.district_id = $('#district_id').val();
    obj.state_id = $('#state_id').val();
    obj.notes = $('#notes').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function(window, document) {
        var loader = function() {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
            loader);
    })(window, document);
</script>

<script>
    (function(window, document) {
        var loader = function() {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
            loader);
    })(window, document);
</script>


</html>
