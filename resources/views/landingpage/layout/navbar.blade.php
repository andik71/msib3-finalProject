<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            @if (!empty(Auth::user()->id) && Auth::user()->role == 'admin')
            <div>
                <i class="fa fa-user mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="{{ url('/admin') }}">visit admin
                    panel</a>
            </div>
            @elseif (!empty(Auth::user()->id) && Auth::user()->role == 'manager')
            <div>
                <i class="fa fa-user mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="{{ url('/admin') }}">visit admin
                    panel</a>
            </div>
            @elseif (!empty(Auth::user()->id) && Auth::user()->role == 'staff')
            <div>

            </div>
            @else
            <div>

            </div>
            @endif
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="{{ url('/') }}">
            Computerpedia
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                @if (!empty(Auth::user()->id))
                    <a class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="dropdown">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-danger text-white">{{$cart}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header"> 
                            <span class="me-5">My Cart <span style="visibility: hidden;">ppppppppppppppppppp</span> </span>
                            <a href={{url('/cart')}}>
                                <span class="badge rounded-pill bg-success p-2 ms-5">View all</span>
                            </a>
                        </li>
                        <hr class="border border-success border-1 opacity-50">
                        @if (count($carts)==0)
                        <li>
                            <h5 class="fw-bold text-center mt-5 mb-5">Your Cart Is Empty.</h5>
                        </li>
                        @else
                        @foreach ($carts as $item)
                        <li class="dropdown-item">

                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('/public/admin/img/')}}/{{$item->photo}}"
                                    class="img-thumbnail">
                                </div>
                                <div class="col-5">
                                    <h6 class="fw-bold">{{$item->name}}</h6>
                                    <p>
                                        {{($item->order_quantity)}} Items.
                                        <br>
                                        Rp {{ number_format($item->total_price)}}.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <hr class="border border-success border-1 opacity-50">
                        @endforeach
                        @endif
                    </ul>

                    <i class="fa fa-fw fa-user text-dark me-2"></i>
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/profile', Auth::user()->id) }}">Profile</a></li>
                        <li><a class="dropdown-item" href={{ url('/cart')}} >My Cart</a></li>
                        <li><a class="dropdown-item"  href={{ url('/orders')}}>My Orders</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right">
                                </i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @else
                    <a class="nav-icon d-none d-lg-inline btn btn-outline-success" href="{{ route('login') }}">
                        <span class="text-dark">Login</span>
                    </a>
                    <a class="nav-icon d-none d-lg-inline btn btn-success" href="{{ route('register') }}">
                        <span class="text-dark">Register</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q"
                    placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>
