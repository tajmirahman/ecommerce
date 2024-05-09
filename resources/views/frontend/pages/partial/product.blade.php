@php
    $products = App\Models\Admin\Product::where('status',1)->orderBy('id','ASC')->latest()->get();
@endphp


<section class="section product-slider tab-slider-product">
    <div class="container">
        <div class="section-header d-none">
            <h2>Special Offers</h2>
            <p>Browse the huge variety of our best seller</p>
        </div>

        <div class="tabs-listing">
            <ul class="nav nav-tabs style1 justify-content-center" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font active" id="bestsellers-tab" data-bs-toggle="tab"
                        data-bs-target="#bestsellers" type="button" role="tab" aria-controls="bestsellers"
                        aria-selected="true">Bestseller</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="newarrivals-tab" data-bs-toggle="tab"
                        data-bs-target="#newarrivals" type="button" role="tab" aria-controls="newarrivals"
                        aria-selected="false">New Arrivals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="toprated-tab" data-bs-toggle="tab" data-bs-target="#toprated"
                        type="button" role="tab" aria-controls="toprated" aria-selected="false">Top Rated</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabsContent">

                {{-- Best seller section start --}}

                <div class="tab-pane show active" id="bestsellers" role="tabpanel" aria-labelledby="bestsellers-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

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

                                        <div class="product-form-submit buyit fl-1 ms-3 mb-3">
                                            <button type="submit"
                                                class="btn btn-primary proceed-to-checkout"><span>Buy it
                                                    now</span></button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="view-collection text-center mt-4 mt-md-5">
                            <a href="shop-left-sidebar.html" class="btn btn-secondary btn-lg">View Collection</a>
                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>

                {{-- Best seller section end --}}


                @php
                    $products = App\Models\Admin\Product::where('special_offer', 1)->orderBy('id', 'ASC')->get();
                @endphp

                <div class="tab-pane" id="newarrivals" role="tabpanel" aria-labelledby="newarrivals-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">
                                            <!-- Start Product Image -->
                                            <a href="product-layout1.html" class="product-img rounded-3"><img
                                                    class="blur-up lazyload"
                                                    src="{{ asset($product->product_image) }}" alt="Product"
                                                    title="Product" width="625" height="808" /></a>
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
                                                <a href="product-layout1.html">{{ $product->product_name }}</a>
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

                                        <div class="product-form-submit buyit fl-1 ms-3 mb-3">
                                            <button type="submit"
                                                class="btn btn-primary proceed-to-checkout"><span>Buy it
                                                    now</span></button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>

                        <div class="view-collection text-center mt-4 mt-md-5">
                            <a href="shop-left-sidebar.html" class="btn btn-secondary btn-lg">View Collection</a>
                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>


                @php
                    $products = App\Models\Admin\Product::where('special_deals', 1)->orderBy('id', 'ASC')->get();
                @endphp


                <div class="tab-pane" id="toprated" role="tabpanel" aria-labelledby="toprated-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">


                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">
                                            <!-- Start Product Image -->
                                            <a href="product-layout1.html" class="product-img rounded-3"><img
                                                    class="blur-up lazyload"
                                                    src="{{ asset($product->product_image) }}" alt="Product"
                                                    title="Product" width="625" height="808" /></a>
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
                                                <a href="product-layout1.html">{{ $product->product_name }}</a>
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

                                        <div class="product-form-submit buyit fl-1 ms-3 mb-3">
                                            <button type="submit"
                                                class="btn btn-primary proceed-to-checkout"><span>Buy it
                                                    now</span></button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="view-collection text-center mt-4 mt-md-5">
                            <a href="shop-left-sidebar.html" class="btn btn-secondary btn-lg">View Collection</a>
                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>
            </div>
        </div>
    </div>
</section>
