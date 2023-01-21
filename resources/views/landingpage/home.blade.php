@extends('landingpage.index')
@section('content')
<!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src=" {{ url('/public//assets/img/banner_img_01.jpg')}} " alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Computerpedia</b> eCommerce</h1>
                                <h3 class="h2">Buy mobile phones, laptops and computers</h3>
                                <p>
                                    Get the latest smartphones, laptops and PCs from our online shop. Choose your model from an extensive range of high-quality devices and upgrade your computer today.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ url('/public//assets/img/banner_img_02.jpg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Get a new phone</h1>
                                <h3 class="h2">Your Trusted Shopping Partner</h3>
                                <p>
                                    Whether you are after a MacBook Air, iPhone X or Google Pixel, we have the latest laptops, smartphones and computers <strong>available for you to buy online.</strong>  Refresh your computer today and save money.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ url('/public//assets/img/banner_img_03.jpg')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">We sell pc all in one</h1>
                                <h3 class="h2">Essentials of Computer Technology</h3>
                                <p>
                                    Get the latest smartphones, laptops and PCs from our online shop. Choose your model from an extensive range of high-quality devices and upgrade your computer today.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Products</h1>
                <p>
                    We have it all - the latest smartphones, laptops, and PCs are waiting for you in our online shop.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $cat)
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ asset('/public/admin/img/')}}/{{$cat->photo}} " class="img-fluid"></a>
                <h5 class="text-center mt-3 mb-3">{{ $cat->name }}</h5>
                <p class="text-center"><a href="{{ url('/shop')}}" class="btn btn-success">Go Shop</a></p>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Designed to help you find the best computer products and other electronics in one place, Computerpedia allows customers to browse a wide selection of products and read reviews before making a purchase.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('detail.shop',$product->id ) }}">
                            <img src="{{ asset('/public/admin/img/')}}/{{$product->photo}} " class="card-img-top img-fluid">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('detail.shop',$product->id ) }}" class="h2 text-decoration-none text-dark">{{$product->name}}</a>
                            <p class="card-text fw-bold mt-3">
                                Rp. {{number_format($product->price)}}
                            </p>
                            <p class="card-text"><i class="fa fa-store"></i> {{$product->shop}} {{$product->location}} </p>
                            <p class="card-text"><i class="fa fa-star text-warning"></i>{{$product->rating}} | <i class="fa fa-shopping-bag"></i> Terjual {{$product->sold}}+</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->    
@endsection
