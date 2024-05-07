
@php
    $sliders= App\Models\Admin\Slider::latest()->get();
@endphp


<section class="slideshow slideshow-wrapper">
    <div class="home-slideshow slick-arrow-dots">

        @foreach ($sliders as $slider)
        <div class="slide">
            <div class="slideshow-wrap">
                <picture>
                    <source media="(max-width:767px)" srcset="{{ asset('storage/slider/' . $slider->slider_image) }}" width="1150" height="800">
                    <img class="blur-up lazyload" src="{{ asset('storage/slider/' . $slider->slider_image) }}" alt="slideshow" title="" width="1920" height="795" />
                </picture>
                <div class="container">
                    <div class="slideshow-content slideshow-overlay middle-left">
                        <div class="slideshow-content-in">
                            <div class="wrap-caption animation style1">
                                <p class="ss-small-title"></p>
                                <h2 class="ss-mega-title">{{ $slider->slider_name }}
                                <p class="ss-sub-title xs-hide">{{ $slider->description }}</p>
                                <div class="ss-btnWrap">
                                    <a class="btn btn-primary" href="shop-grid-view.html">Shop Women</a>
                                    <a class="btn btn-secondary" href="shop-grid-view.html">Shop Men</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>

