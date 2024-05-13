@extends('frontend.master_dashboard')
@section('user')
    <div id="page-content">
        <!--Page Header-->
        <div class="page-header text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                        <div class="page-title">
                            <h1>Shop Left Sidebar</h1>
                        </div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a><span
                                class="title"><i class="icon anm anm-angle-right-l"></i>Shop</span><span
                                class="main-title"><i class="icon anm anm-angle-right-l"></i>Shop Left Sidebar</span></div>
                        <!--End Breadcrumbs-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Header-->

        <!--Main Content-->
        <div class="container">
            <!--Category Slider-->
            <div class="collection-slider-6items gp10 slick-arrow-dots sub-collection section pt-0">

                @foreach ($subCats as $subCat)
                    <div class="category-item zoomscal-hov">
                        <a href="shop-left-sidebar.html" class="category-link clr-none">
                            <div class="zoom-scal zoom-scal-nopb rounded-0"><img class="rounded-0 blur-up lazyload"
                                    data-src="{{ asset('storage/subcategory/' . $subCat->subcategory_image) }}"
                                    src="{{ asset('storage/subcategory/' . $subCat->subcategory_image) }}" alt="Men's"
                                    title="Men's" width="365" height="365" /></div>
                            <div class="details text-center">
                                <h4 class="category-title mb-0">{{ $subCat->subcategory_name }}</h4>
                                <p class="counts">{{ count($childCats) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
            <!--End Category Slider-->
            <div class="row">
                <!--Sidebar-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar sidebar-bg filterbar">
                    <div class="closeFilter d-block d-lg-none"><i class="icon anm anm-times-r"></i></div>
                    <div class="sidebar-tags sidebar-sticky clearfix">
                        <!--Filter By-->
                        <div class="sidebar-widget filterBox filter-widget">
                            <div class="widget-title">
                                <h2>Filter By</h2>
                            </div>
                            <div class="widget-content filterby filterDD">
                                <ul class="items tags-list d-flex-wrap">
                                    <li class="item"><a href="#;" class="rounded-5"><span
                                                class="filter-value">Women</span><i class="icon anm anm-times-r"></i></a>
                                    </li>
                                    <li class="item"><a href="#;" class="rounded-5"><span
                                                class="filter-value">Blue</span><i class="icon anm anm-times-r"></i></a>
                                    </li>
                                    <li class="item"><a href="#;" class="rounded-5"><span
                                                class="filter-value">XL</span><i class="icon anm anm-times-r"></i></a>
                                    </li>
                                </ul>
                                <a href="#;" class="btn btn-sm brd-link">Clear All</a>
                            </div>
                        </div>
                        <!--End Filter By-->
                        <!--Categories-->
                        <div class="sidebar-widget clearfix categories filterBox filter-widget">
                            <div class="widget-title">
                                <h2>Categories</h2>
                            </div>
                            <div class="widget-content filterDD">
                                <ul class="sidebar-categories scrollspy morelist clearfix">

                                    @foreach($categorys as $category)
                                        <li class="lvl1 sub-level more-item"><a href="#;"
                                                class="site-nav">{{ $category->category_name }}</a>
                                            <ul class="sublinks">

                                                @foreach ($subCats as $subCat)
                                                    <li class="lvl2 sub-level sub-sub-level"><a href="#;"
                                                            class="site-nav">{{ $subCat->subcategory_name }}</a>
                                                        <ul class="sublinks">

                                                            @foreach ($childCats as $childCat)


                                                            <li class="lvl3"><a href="#" class="site-nav">{{ $childCat->childcategory_name }}
                                                                    <span class="count">(25)</span></a>
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!--Categories-->
                        <!--Price Filter-->
                        <div class="sidebar-widget filterBox filter-widget">
                            <div class="widget-title">
                                <h2>Price</h2>
                            </div>
                            <form class="widget-content price-filter filterDD" action="#" method="post">
                                <div id="slider-range" class="mt-2"></div>
                                <div class="row">
                                    <div class="col-6"><input id="amount" type="text" /></div>
                                    <div class="col-6 text-right"><button class="btn btn-sm">filter</button></div>
                                </div>
                            </form>
                        </div>
                        <!--End Price Filter-->

                    </div>
                </div>
                <!--End Sidebar-->

                <!--Products-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                    <!--Toolbar-->
                    <div class="toolbar toolbar-wrapper shop-toolbar">
                        <div class="row align-items-center">
                            <div
                                class="col-4 col-sm-2 col-md-4 col-lg-4 text-left filters-toolbar-item d-flex order-1 order-sm-0">
                                <button type="button"
                                    class="btn btn-filter icon anm anm-sliders-hr d-inline-flex d-lg-none me-2"><span
                                        class="d-none">Filter</span></button>
                                <div class="filters-item d-flex align-items-center">
                                    <label class="mb-0 me-2 d-none d-lg-inline-block">View as:</label>
                                    <div class="grid-options view-mode d-flex">
                                        <a class="icon-mode mode-list d-block" data-col="1"></a>
                                        <a class="icon-mode mode-grid grid-2 d-block" data-col="2"></a>
                                        <a class="icon-mode mode-grid grid-3 d-md-block" data-col="3"></a>
                                        <a class="icon-mode mode-grid grid-4 d-lg-block active" data-col="4"></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-4 col-md-4 col-lg-4 text-center product-count order-0 order-md-1 mb-3 mb-sm-0">
                                <span class="toolbar-product-count">Showing: 15 products</span>
                            </div>
                            <div
                                class="col-8 col-sm-6 col-md-4 col-lg-4 text-right filters-toolbar-item d-flex justify-content-end order-2 order-sm-2">
                                <div class="filters-item d-flex align-items-center">
                                    <label for="ShowBy"
                                        class="mb-0 me-2 text-nowrap d-none d-sm-inline-flex">Show:</label>
                                    <select name="ShowBy" id="ShowBy" class="filters-toolbar-show">
                                        <option value="title-ascending" selected="selected">10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="filters-item d-flex align-items-center ms-2 ms-lg-3">
                                    <label for="SortBy" class="mb-0 me-2 text-nowrap d-none">Sort by:</label>
                                    <select name="SortBy" id="SortBy" class="filters-toolbar-sort">
                                        <option value="featured" selected="selected">Featured</option>
                                        <option value="best-selling">Best selling</option>
                                        <option value="title-ascending">Alphabetically, A-Z</option>
                                        <option value="title-descending">Alphabetically, Z-A</option>
                                        <option value="price-ascending">Price, low to high</option>
                                        <option value="price-descending">Price, high to low</option>
                                        <option value="created-ascending">Date, old to new</option>
                                        <option value="created-descending">Date, new to old</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->

                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div class="row col-row product-options row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">
                                            <!-- Start Product Image -->
                                            <a href="{{ url('product-details/'.$product->id.'/'.$product->product_slug) }}" class="product-img rounded-3"><img
                                                    class="blur-up lazyload" src="{{ asset($product->product_image) }}"
                                                    alt="Product" title="Product" width="625" height="808" /></a>
                                            <!-- End Product Image -->
                                            <!-- Product label -->
                                            <div class="product-labels"><span
                                                    class="lbl on-sale">{{ $product->stock }}</span></div>
                                            <!-- End Product label -->
                                            <!--Countdown Timer-->
                                            {{-- <div class="saleTime" data-countdown="2024/07/01"></div> --}}
                                            <!--End Countdown Timer-->
                                            <!--Product Button-->
                                            <div class="button-set style1">
                                                <!--Cart Button-->
                                                <a href="#quickshop-modal" class="btn-icon addtocart quick-shop-modal"
                                                    data-bs-toggle="modal" data-bs-target="#quickshop_modal">
                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick Shop"><i class="icon anm anm-cart-l"></i><span
                                                            class="text">Quick Shop</span></span>
                                                </a>
                                                <!--End Cart Button-->
                                                <!--Quick View Button-->
                                                <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                                    data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick View"><i
                                                            class="icon anm anm-search-plus-l"></i><span
                                                            class="text">Quick View</span></span>
                                                </a>
                                                <!--End Quick View Button-->
                                                <!--Wishlist Button-->
                                                <a href="wishlist-style2.html" class="btn-icon wishlist"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span
                                                        class="text">Add To Wishlist</span></a>
                                                <!--End Wishlist Button-->
                                                <!--Compare Button-->
                                                <a href="compare-style2.html" class="btn-icon compare"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Add to Compare"><i class="icon anm anm-random-r"></i><span
                                                        class="text">Add to Compare</span></a>
                                                <!--End Compare Button-->
                                            </div>
                                            <!--End Product Button-->
                                        </div>
                                        <!-- End Product Image -->
                                        <!-- Start Product Details -->
                                        <div class="product-details">
                                            <!-- Product Name -->
                                            <div class="product-name">
                                                <a href="{{ url('product-details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a>
                                            </div>
                                            <!-- End Product Name -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $total_discount = ($amount / $product->selling_price) * 100;
                                            @endphp

                                            <!-- Product Price -->
                                            <div class="product-price">
                                                @if ($product->discount_price == null)
                                                    <span class="price">{{ $product->selling_price }}
                                                    @else
                                                        <span
                                                            class="price old-price">{{ $product->selling_price }}</span><span
                                                            class="price">{{ $product->discount_price }}</span>
                                                @endif
                                            </div>
                                            <!-- End Product Price -->
                                            <!-- Product Review -->
                                            <div class="product-review">
                                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                    class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                    class="icon anm anm-star-o"></i>
                                                <span class="caption hidden ms-1">3 Reviews</span>
                                            </div>
                                            <!-- End Product Review -->



                                            @php
                                                $multiImages = App\Models\Admin\MultiImage::where(
                                                    'product_id',
                                                    $product->id,
                                                )
                                                    ->orderBy('multi_image', 'ASC')
                                                    ->get();
                                            @endphp


                                            <!--Color Variant -->
                                            <ul class="variants-clr swatches">

                                                @foreach ($multiImages as $multiImage)
                                                    <li class="swatch medium radius"><span class="swatchLbl"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Navy"><img
                                                                src="{{ asset($multiImage->multi_image) }}"
                                                                alt="product" width="625"
                                                                height="808" /></span></li>
                                                @endforeach

                                            </ul>
                                            <!-- End Variant -->



                                        </div>
                                        <!-- End product details -->

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Pagination -->
                        <nav class="clearfix pagination-bottom">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#"><i
                                            class="icon anm anm-angle-left-l"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="icon anm anm-angle-right-l"></i></a></li>
                            </ul>
                        </nav>
                        <!-- End Pagination -->
                    </div>
                    <!--End Product Grid-->
                </div>
                <!--End Products-->
            </div>
        </div>
        <!--End Main Content-->
    </div>
@endsection
