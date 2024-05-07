@extends('frontend.master_dashboard')
@section('user')

<!--Home Slideshow-->
    @include('frontend.pages.partial.slider')
<!--End Home Slideshow-->

<!--Service Section-->
{{-- <section class="section service-section pb-0">
    <div class="container">
        <div class="service-info row col-row row-cols-lg-4 row-cols-md-4 row-cols-sm-2 row-cols-2 text-center">
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-phone-call-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Call us any time</h3>
                    <span class="text-muted">Contact us 24/7 hours a day</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-truck-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Pickup At Any Store</h3>
                    <span class="text-muted">Free shipping on orders over $65</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-credit-card-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Secured Payment</h3>
                    <span class="text-muted">We accept all major credit cards</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-redo-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Free Returns</h3>
                    <span class="text-muted">30-days free return policy</span>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--End Service Section-->

<!--Collection banner-->
    @include('frontend.pages.partial.banner');
<!--End Collection banner-->

<!--Popular Categories-->

<!--End Popular Categories-->

<!--Products With Tabs-->
    @include('frontend.pages.partial.product')
<!--End Products With Tabs-->

<!--Parallax Banner-->
<div class="section parallax-banner-style1 py-0">
    <div class="hero hero-large hero-overlay bg-size">
        <img class="bg-img" src="{{ asset('frontend') }}/assets/images/parallax/demo1-sale-banner.jpg" alt="Clearance Sale - Flat 50% Off" width="1920" height="645" />
        <div class="hero-inner d-flex-justify-center">
            <div class="container">
                <div class="wrap-text center text-white">
                    <h1 class="hero-title text-white">Clearance Sale - Flat 50% Off</h1>
                    <p class="hero-subtitle h3 text-white">Sale will end soon in</p>
                    <!--Countdown Timer-->
                    <div class="hero-saleTime d-flex-center text-center justify-content-center" data-countdown="2028/10/01"></div>
                    <!--End Countdown Timer-->
                    <p class="hero-details">Hema Multipurpose Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion.</p>
                    <a href="shop-left-sidebar.html" class="hero-btn btn btn-light">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Parallax Banner-->

<!--Testimonial Section-->
<section class="section testimonial-slider style1">
    <div class="container">
        <div class="section-header">
            <p class="mb-2 mt-0">Happy Customer</p>
            <h2>Loved By Our Customers</h2>
        </div>

        <div class="testimonial-wraper">
            <!--Testimonial Slider Items-->
            <div class="testimonial-slider-3items gp15 slick-arrow-dots arwOut5">
                <div class="testimonial-slide">
                    <div class="testimonial-content text-center">
                        <div class="quote-icon mb-3 mb-lg-4"><img class="blur-up lazyload mx-auto" data-src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" alt="icon" width="40" height="40" /></div>
                        <div class="content">
                            <div class="text mb-2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 1500s.</p></div>
                            <div class="product-review my-3">
                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i>
                                <span class="caption hidden ms-1">24 Reviews</span>
                            </div>
                        </div>
                        <div class="auhimg d-flex-justify-center text-left">
                            <div class="image"><img class="rounded-circle blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/users/testimonial1-65x.jpg" src="{{ asset('frontend') }}/assets/images/users/testimonial1-65x.jpg" alt="John Doe" width="65" height="65" /></div>
                            <div class="auhtext ms-3">
                                <h5 class="authour mb-1">John Doe</h5>
                                <p class="text-muted">Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-content text-center">
                        <div class="quote-icon mb-3 mb-lg-4"><img class="blur-up lazyload mx-auto" data-src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" alt="icon" width="40" height="40" /></div>
                        <div class="content">
                            <div class="text mb-2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 1500s.</p></div>
                            <div class="product-review my-3">
                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                                <span class="caption hidden ms-1">15 Reviews</span>
                            </div>
                        </div>
                        <div class="auhimg d-flex-justify-center text-left">
                            <div class="image"><img class="rounded-circle blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/users/testimonial2-65x.jpg" src="{{ asset('frontend') }}/assets/images/users/testimonial2-65x.jpg" alt="Jessica Doe" width="65" height="65" /></div>
                            <div class="auhtext ms-3">
                                <h5 class="authour mb-1">Jessica Doe</h5>
                                <p class="text-muted">Marketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-content text-center">
                        <div class="quote-icon mb-3 mb-lg-4"><img class="blur-up lazyload mx-auto" data-src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" alt="icon" width="40" height="40" /></div>
                        <div class="content">
                            <div class="text mb-2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 1500s.</p></div>
                            <div class="product-review my-3">
                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                <span class="caption hidden ms-1">17 Reviews</span>
                            </div>
                        </div>
                        <div class="auhimg d-flex-justify-center text-left">
                            <div class="image"><img class="rounded-circle blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/users/testimonial3-65x.jpg" src="{{ asset('frontend') }}/assets/images/users/testimonial3-65x.jpg" alt="Rick Edward" width="65" height="65" /></div>
                            <div class="auhtext ms-3">
                                <h5 class="authour mb-1">Rick Edward</h5>
                                <p class="text-muted">Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide rounded-3">
                    <div class="testimonial-content text-center">
                        <div class="quote-icon mb-3 mb-lg-4"><img class="blur-up lazyload mx-auto" data-src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" src="{{ asset('frontend') }}/assets/images/icons/demo1-quote-icon.png" alt="icon" width="40" height="40"/></div>
                        <div class="content">
                            <div class="text mb-2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 1500s.</p></div>
                            <div class="product-review my-3">
                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i>
                                <span class="caption hidden ms-1">29 Reviews</span>
                            </div>
                        </div>
                        <div class="auhimg d-flex-justify-center text-left">
                            <div class="image"><img class="rounded-circle blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/users/testimonial4-65x.jpg" src="{{ asset('frontend') }}/assets/images/users/testimonial4-65x.jpg" alt="Happy Buyer" width="65" height="65"/></div>
                            <div class="auhtext ms-3">
                                <h5 class="authour mb-1">Happy Buyer</h5>
                                <p class="text-muted">Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Testimonial Slider Items-->
        </div>
    </div>
</section>
<!--End Testimonial section-->

<!--Blog Post-->
<section class="section home-blog-post">
    <div class="container">
        <div class="section-header">
            <p class="mb-2 mt-0">Latest post</p>
            <h2>Most Recent News</h2>
        </div>

        <div class="blog-slider-3items gp15 arwOut5 hov-arrow">
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/blog/post-img1.jpg" src="{{ asset('frontend') }}/assets/images/blog/post-img1.jpg" alt="New shop collection our shop" width="740" height="410" /></a>
                        <div class="date"><span class="dt">25</span> <span class="mt">Apr<br> <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">New shop collection our shop</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/blog/post-img2.jpg" src="{{ asset('frontend') }}/assets/images/blog/post-img2.jpg" alt="Gift ideas for everyone" width="740" height="410" /></a>
                        <div class="date"><span class="dt">31</span> <span class="mt">Mar<br> <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">Gift ideas for everyone</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the majority suffered.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload" data-src="{{ asset('frontend') }}/assets/images/blog/post-img3.jpg" src="{{ asset('frontend') }}/assets/images/blog/post-img3.jpg" alt="Sales with best collection" width="740" height="410" /></a>
                        <div class="date"><span class="dt">30</span> <span class="mt">Jan<br> <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">Sales with best collection</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Blog Post-->

@endsection
