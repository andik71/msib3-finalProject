@extends('landingpage.index')
@section('content')

<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>About Us</h1>
                <p>
                    Computerpedia is an e-commerce platform that allows customers to search and buy products from multiple retailers all in one place. Get the latest smartphones, laptops and PCs from our online shop. Choose your model from an extensive range of high-quality devices and upgrade your computer today.
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('/public/assets/img/about-hero.svg') }} " alt="About Hero">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Our Services</h1>
            <p>
                We make it faster for customers to find the right product at the right place.
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Delivery Services</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promotion</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    We've got the latest phones, laptops, and tablets. Browse our range of quality devices and upgrade your computer today.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/public/assets/img/apple.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/public/assets/img/rog.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/public/assets/img/hp.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/public/assets/img/asus.png') }}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->

@endsection


