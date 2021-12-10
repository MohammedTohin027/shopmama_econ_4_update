<div id="brands-carousel" class="logo-slider wow fadeInUp">

    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

            @foreach ($pub_brands as $brand)
            <div class="item m-t-15">
                <a href="#" class="image">
                    <img data-echo="{{ asset($brand->brand_image) }}"
                        src="{{ asset($brand->brand_image) }}" alt="" width="100">
                </a>
            </div>
            @endforeach

            <!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->


