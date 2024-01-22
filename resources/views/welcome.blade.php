@extends('layouts.website',['page_name'=>'Home'])
@section('content')
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="swiper-container slider__active">
            <div class="slider-wrapper swiper-wrapper">
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="assets/img/slider/01-slide-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /single-slider -->
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="assets/img/slider/01-slide-2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /single-slider -->
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="assets/img/slider/01-slide-3.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /single-slider -->
                <div class="main-slider-paginations"></div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->

    <!-- features__area-start -->
    <section class="features__area pt-20">
        <div class="container">
            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-search"></i>
                        </div>
                        <div class="features__content">
                            <h6>QUICK SEARCH</h6>
                            <p>The platform allows easy search for products, services & businesses in your country.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-user-md-chat"></i>
                        </div>
                        <div class="features__content">
                            <h6>QUICK CHAT</h6>
                            <p>The platform allows you to quickly contact a service/product provider the minute you like their product/service. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-shopping-cart"></i>
                        </div>
                        <div class="features__content">
                            <h6>EVERYTHING IS THERE</h6>
                            <p>The platform covers every service/product offered by any business in your country. We are always updating the records the minutes changes happen in the market.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item features__item-last d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fad fa-check-circle"></i>
                        </div>
                        <div class="features__content">
                            <h6>BUSINESS VERIFICATION</h6>
                            <p>We offer business verification services, this ensures customers that they are getting products/services from reliable providers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features__area-end -->

    <!-- banner__area-start -->
    <section class="banner__area pt-20 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="assets/img/banner/banner-1.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">Intelligent <br> New Touch Control</a></h6>
                            <p>Discount  20% On Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="assets/img/banner/banner-2.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">On-sale <br> Best Prices</a></h6>
                            <p>Limited Time: Online Only!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="assets/img/banner/banner-3.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">Hot Sale <br> Super Laptops 2022 </a></h6>
                            <p>Free Shipping All Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner__area-end -->

    @include('components.website.cta-area')
@endsection
