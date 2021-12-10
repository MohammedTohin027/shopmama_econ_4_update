<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url({{ asset($slider->image) }});">
                <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="slider-header fadeInDown-1">
                            @if($slider->title_en == null)

                            @else
                                @if(session()->get('language') == 'bangla')
                                    শপমামা
                                @else
                                    SHOPMAMA
                                @endif
                            @endif

                        </div>
                        <div class="big-text fadeInDown-1">
                            @if ($slider->title_en == null)
                            @else
                                @if (session()->get('language') == 'bangla')
                                    {{ $slider->title_bn }}
                                @else
                                    {{ $slider->title_en }}
                                @endif
                            @endif
                        </div>

                        <div class="excerpt fadeInDown-2 hidden-xs">

                            @if ($slider->description_en == null)
                            @else
                                @if (session()->get('language') == 'bangla')
                                    <span>{{ $slider->description_bn }}</span>
                                @else
                                    {{ $slider->description_en }}
                                @endif
                            @endif

                        </div>

                        @if ($slider->title_en == null)

                        @else
                            <div class="button-holder fadeInDown-3">
                                <a href="index6c11.html?page=single-product"
                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                    @if (session()->get('language') == 'bangla')
                                        শপ নাও
                                    @else
                                        Shop
                                        Now
                                    @endif
                                </a>
                            </div>
                        @endif
                    </div><!-- /.caption -->
                </div><!-- /.container-fluid -->
            </div><!-- /.item -->
        @endforeach
    </div><!-- /.owl-carousel -->
</div>
