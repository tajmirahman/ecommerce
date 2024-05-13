@php
    $banners= App\Models\Banner::find(1);
    $bannerss= App\Models\Banner::find(2);
    $bannersss= App\Models\Banner::find(3);
@endphp

<section class="section collection-banners pb-0">
    <div class="container">
        <div class="collection-banner-grid">
            <div class="row sp-row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 collection-banner-item">
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload" data-src="{{ asset($banners->banner_image) }}" src="{{ asset($banners->banner_image) }}" alt="Women Wear" title="Women Wear" width="645" height="723" />
                            </div>
                            <div class="details middle-right">
                                <div class="inner">
                                    <p class="mb-2">Trending Now</p>
                                    <h3 class="title">Women Wear</h3>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 collection-banner-item">
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload" data-src="{{ asset($bannerss->banner_image) }}" src="{{ asset($bannerss->banner_image) }}" alt="Mens Wear" title="Mens Wear" width="315" height="330" />
                            </div>
                            <div class="details middle-right">
                                <div class="inner">
                                    <h3 class="title mb-2">Mens Wear</h3>
                                    <p class="mb-3">Tailor-made with passion</p>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload" data-src="{{ asset($bannersss->banner_image) }}" src="{{ asset($bannersss->banner_image) }}" alt="Kids Wear" title="Kids Wear" width="315" height="300" />
                            </div>
                            <div class="details middle-right">
                                <div class="inner">
                                    <p class="mb-2">Buy one get one free</p>
                                    <h3 class="title">Kids Wear</h3>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
