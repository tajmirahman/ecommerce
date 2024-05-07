@php
    $products= App\Models\Admin\Product::latest()->get();
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
                    <button class="nav-link head-font active" id="bestsellers-tab" data-bs-toggle="tab" data-bs-target="#bestsellers" type="button" role="tab" aria-controls="bestsellers" aria-selected="true">Bestseller</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="newarrivals-tab" data-bs-toggle="tab" data-bs-target="#newarrivals" type="button" role="tab" aria-controls="newarrivals" aria-selected="false">New Arrivals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="toprated-tab" data-bs-toggle="tab" data-bs-target="#toprated" type="button" role="tab" aria-controls="toprated" aria-selected="false">Top Rated</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabsContent">

                {{-- Best seller section start --}}

                <div class="tab-pane show active" id="bestsellers" role="tabpanel" aria-labelledby="bestsellers-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)


                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3"><img class="blur-up lazyload" src="{{ asset($product->product_image) }}" alt="Product" title="Product" width="625" height="808" /></a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                        <!-- End Product label -->
                                        <!--Countdown Timer-->
                                        <div class="saleTime" data-countdown="2025/01/01"></div>
                                        <!--End Countdown Timer-->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#quickshop-modal" class="btn-icon addtocart quick-shop-modal" data-bs-toggle="modal" data-bs-target="#quickshop_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick Shop"><i class="icon anm anm-cart-l"></i><span class="text">Quick Shop</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
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
                                        $amount= $product->selling_price - $product->discount_price;
                                        $total_discount= $amount / $product->selling_price * 100;
                                        @endphp

                                        <!-- Product Price -->
                                        <div class="product-price">
                                            @if($product->discount_price == NULL)
                                            <span class="price">{{ $product->selling_price }}
                                            @else
                                            <span class="price old-price">{{ $product->selling_price }}</span><span class="price">{{ $product->discount_price }}</span>
                                            @endif
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">3 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->

                                        @php
                                            $multiImages= App\Models\Admin\MultiImage::where('product_id',$product->id)->orderBy('multi_image','ASC')->get();
                                        @endphp


                                        <!--Color Variant -->
                                        <ul class="variants-clr swatches">

                                            @foreach ($multiImages as $multiImage)

                                            <li class="swatch medium radius"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="Navy"><img src="{{ asset($multiImage->multi_image) }}" alt="product" width="625" height="808" /></span></li>

                                            @endforeach

                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
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

                <div class="tab-pane" id="newarrivals" role="tabpanel" aria-labelledby="newarrivals-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product8.jpg" src="{{ asset('frontend') }}/assets/images/products/product8.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product8-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product8-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Narror Neck Tie</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$134.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">0 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                        <!-- Variant -->
                                        <ul class="variants-clr swatches">
                                            <li class="swatch medium radius black"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="black"></span></li>
                                            <li class="swatch medium radius navy"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="navy"></span></li>
                                            <li class="swatch medium radius darkgreen"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="darkgreen"></span></li>
                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product9.jpg" src="{{ asset('frontend') }}/assets/images/products/product9.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product9-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product9-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl pr-label4">Popular</span></div>
                                        <!-- End Product label -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Men's Cheater Jacket</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$99.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">19 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product10.jpg" src="{{ asset('frontend') }}/assets/images/products/product10.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product10-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product10-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Casual Mustard Shirt</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$167.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i>
                                            <span class="caption hidden ms-1">7 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product11.jpg" src="{{ asset('frontend') }}/assets/images/products/product11.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product11-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product11-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Sleeve Round T-Shirt</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$154.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">19 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product12.jpg" src="{{ asset('frontend') }}/assets/images/products/product12.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product12-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product12-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Backpack Laptop Bag</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$121.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">6 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product13.jpg" src="{{ asset('frontend') }}/assets/images/products/product13.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product13-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product13-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Cotton Casual Tshirt</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$167.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">13 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product14.jpg" src="{{ asset('frontend') }}/assets/images/products/product14.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product14-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product14-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Ankle Casual Pants</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$125.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">20 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product15.jpg" src="{{ asset('frontend') }}/assets/images/products/product15.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product15-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product15-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Straight Fit Trousers</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$122.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">11 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                        </div>

                        <div class="view-collection text-center mt-4 mt-md-5">
                            <a href="shop-left-sidebar.html" class="btn btn-secondary btn-lg">View Collection</a>
                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>

                <div class="tab-pane" id="toprated" role="tabpanel" aria-labelledby="toprated-tab">
                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product5.jpg" src="{{ asset('frontend') }}/assets/images/products/product5.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product5-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product5-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl pr-label2">Hot</span></div>
                                        <!-- End Product label -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Hooded Neck Hoodies</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$39.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">3 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                        <!-- Variant -->
                                        <ul class="variants-clr swatches">
                                            <li class="swatch medium radius black"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="black"></span></li>
                                            <li class="swatch medium radius maroon"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="maroon"></span></li>
                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product6.jpg" src="{{ asset('frontend') }}/assets/images/products/product6.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product6-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product6-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl on-sale">Sold out</span></div>
                                        <!-- End Product label -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Foldable Duffel Bag</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$299.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">15 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                        <!-- Variant -->
                                        <ul class="variants-clr swatches">
                                            <li class="swatch medium radius gray"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="gray"></span></li>
                                            <li class="swatch medium radius red"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="red"></span></li>
                                            <li class="swatch medium radius orange"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="orange"></span></li>
                                            <li class="swatch medium radius yellow"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="yellow"></span></li>
                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product7.jpg" src="{{ asset('frontend') }}/assets/images/products/product7.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product7-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product7-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl pr-label1">Best seller</span></div>
                                        <!-- End Product label -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">High-Waisted Pant</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$139.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">11 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                        <!-- Variant -->
                                        <ul class="variants-clr swatches">
                                            <li class="swatch medium radius black"><img src="{{ asset('frontend') }}/assets/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="black" /></li>
                                            <li class="swatch medium radius maroon"><img src="{{ asset('frontend') }}/assets/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="maroon" /></li>
                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product8.jpg" src="{{ asset('frontend') }}/assets/images/products/product8.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product8-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product8-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Narror Neck Tie</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$134.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">0 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                        <!-- Variant -->
                                        <ul class="variants-clr swatches">
                                            <li class="swatch medium radius black"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="black"></span></li>
                                            <li class="swatch medium radius navy"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="navy"></span></li>
                                            <li class="swatch medium radius darkgreen"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="darkgreen"></span></li>
                                        </ul>
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product9.jpg" src="{{ asset('frontend') }}/assets/images/products/product9.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product9-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product9-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- Product label -->
                                        <div class="product-labels"><span class="lbl pr-label4">Popular</span></div>
                                        <!-- End Product label -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Men's Cheater Jacket</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$99.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">19 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product10.jpg" src="{{ asset('frontend') }}/assets/images/products/product10.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product10-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product10-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Casual Mustard Shirt</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$167.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i>
                                            <span class="caption hidden ms-1">7 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product11.jpg" src="{{ asset('frontend') }}/assets/images/products/product11.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product11-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product11-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Sleeve Round T-Shirt</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$154.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">19 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
                            <div class="item col-item">
                                <div class="product-box">
                                    <!-- Start Product Image -->
                                    <div class="product-image">
                                        <!-- Start Product Image -->
                                        <a href="product-layout1.html" class="product-img rounded-3">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product12.jpg" src="{{ asset('frontend') }}/assets/images/products/product12.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/products/product12-1.jpg" src="{{ asset('frontend') }}/assets/images/products/product12-1.jpg" alt="Product" title="Product" width="625" height="808" />
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!--Product Button-->
                                        <div class="button-set style1">
                                            <!--Cart Button-->
                                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal" data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i class="icon anm anm-cart-l"></i><span class="text">Add to Cart</span></span>
                                            </a>
                                            <!--End Cart Button-->
                                            <!--Quick View Button-->
                                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="icon anm anm-search-plus-l"></i><span class="text">Quick View</span></span>
                                            </a>
                                            <!--End Quick View Button-->
                                            <!--Wishlist Button-->
                                            <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span class="text">Add To Wishlist</span></a>
                                            <!--End Wishlist Button-->
                                            <!--Compare Button-->
                                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="icon anm anm-random-r"></i><span class="text">Add to Compare</span></a>
                                            <!--End Compare Button-->
                                        </div>
                                        <!--End Product Button-->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Start Product Details -->
                                    <div class="product-details">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="product-layout1.html">Backpack Laptop Bag</a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <span class="price">$121.00</span>
                                        </div>
                                        <!-- End Product Price -->
                                        <!-- Product Review -->
                                        <div class="product-review">
                                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                            <span class="caption hidden ms-1">6 Reviews</span>
                                        </div>
                                        <!-- End Product Review -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                            </div>
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
