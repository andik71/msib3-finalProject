@extends('landingpage.index')
@section('content')

<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Product
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{ url('shop/smartphone')}}">Smartphones</a></li>
                        <li><a class="text-decoration-none" href="{{ url('shop/laptop')}}">Laptop</a></li>
                        <li><a class="text-decoration-none" href="{{ url('shop/pc')}}">PC All In One</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="{{ url('/shop')}}">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="{{ url('shop/smartphone')}}">Smartphone</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="{{ url('shop/laptop')}}">Laptop</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="{{ url('shop/pc')}}">PC All in One</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <form action="{{ route('product.indexShop') }}">
                    <div class="d-flex">
                            <div class="input-group search-wrapper">
                                <span class="input-group-text"><i class="fa fa-fw fa-search"></i></span>
                                <input type="input" name="search" class="form-control" placeholder="Search Product..."
                                value="{{ request('search') }}">
                            </div>
                            <button type="submit" class="btn btn-success ms-3">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 products-card">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img height="700px" class="card-img rounded-0 img-fluid" src=" {{ asset('/public/admin/img/') }}/{{$product->photo}} ">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="{{ route('detail.shop',$product->id ) }}"><i class="far fa-eye"></i></a></li>

                                    <form method="POST" action="{{ route('product.addCart') }}" enctype = "multipart/form-data">
                                        @csrf
                                        @if (empty(Auth::user()->id))
                                        <input type="hidden" name="users_id" value="">
                                        @else
                                        <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                                        @endif
                                        <input type="hidden" name="products_id" value="{{$product->id}}">
                                        <input type="hidden" name="order_quantity" value="1">
                                        <input type="hidden" name="total_price" value={{$product->price}}>
                                        <li><button class="btn btn-success text-white mt-2"  type="submit"><i class="fas fa-cart-plus"></i></button></li>

                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body result-container">
                            <a href="{{ route('detail.shop',$product->id ) }}" class="h3 text-decoration-none">{{$product->name}}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li class="align-items-center">{{$product->category->name}}</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">Rp {{number_format($product->price)}}</p>
                        </div>
                    </div>
                </div>   
                @endforeach
            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
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
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection




