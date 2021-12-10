<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
        @if (session()->get('language') == 'bangla')
            ক্যাটাগরিসমূহ
        @else
            Categories
        @endif
    </div>

    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @php
                $all_pub_cat = App\Models\Category::where('status', 1)
                    ->latest()
                    ->get();
            @endphp

            @foreach ($all_pub_cat as $cat)
                <li class="dropdown menu-item">
                    @if (session()->get('language') == 'bangla')
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon {{ $cat->category_icon }}"
                                aria-hidden="true"></i>{{ $cat->category_name_bn }}</a>
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon }}"
                                aria-hidden="true"></i>{{ $cat->category_name_en }}</a>
                    @endif
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $all_pub_subcat = App\Models\SubCategory::where('status', 1)
                                        ->where('category_id', $cat->id)
                                        ->latest()
                                        ->get();
                                @endphp
                                @forelse ($all_pub_subcat as $subcat)
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            @if (session()->get('language') == 'bangla')
                                                <h2 class="title"><a
                                                        href="#">{{ $subcat->subcategory_name_bn }}</a></h2>
                                            @else
                                                <h2 class="title"><a
                                                        href="#">{{ $subcat->subcategory_name_en }}</a></h2>
                                            @endif
                                            @php
                                                $all_pub_subsubcat = App\Models\SubSubCategory::where('status', 1)
                                                    ->where('subcategory_id', $subcat->id)
                                                    ->latest()
                                                    ->get();
                                            @endphp
                                            @forelse($all_pub_subsubcat as $subsubcat)
                                                @if (session()->get('language') == 'bangla')
                                                <li><a href="#">{{ $subsubcat->subsubcategory_name_bn }} </a></li>
                                                @else
                                                <li><a href="#">{{ $subsubcat->subsubcategory_name_en }} </a></li>
                                                @endif
                                            @empty
                                            @if (session()->get('language') == 'bangla')
                                                <span class="text-danger" style="font-size: 12px; font-weight:bold; text-align:center">আইটে খুঁজে পাওয়া যায় নি</span>
                                            @else
                                                <span class="text-danger" style="font-size: 12px; font-weight:bold; text-align:center">Item Not Found</span>
                                            @endif
                                        @endforelse
                                        </ul>
                                    </div><!-- /.col -->
                                @empty
                                    @if (session()->get('language') == 'bangla')
                                        <span class="text-danger" style="font-size: 12px; font-weight:bold; text-align:center">আইটে খুঁজে পাওয়া যায় নি</span>
                                    @else
                                        <span class="text-danger" style="font-size: 12px; font-weight:bold; text-align:center">Item Not Found</span>
                                    @endif
                                @endforelse

                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->

                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.menu-item -->


            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->

</div><!-- /.side-menu -->
