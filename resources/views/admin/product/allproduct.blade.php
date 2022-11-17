@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Product</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    </nav>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
    
    
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body">
                    <h5 class="card-title">Recent Product <span>| Today</span></h5>
                    <table class="table table-borderless datatable">
                        <div>
                            <a class="btn btn-sm btn-primary mb-2" href="{{ route('product.create') }}" ><i class="bi bi-plus-lg"></i> Add Product</a>
                        </div>

                    <thead>
                        <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Category</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row"><a href="#">#{{ $product->code}}</a></th>
                            <td>
                            @empty($product->photo)
                            <img src="{{ url('public/admin/img/nophoto.png') }}" width="35%" alt="product" class="rounded-circle">
                            @else
                            <img src="{{ url('public/admin/img')}}/{{$product->photo}}" width="70px" alt="product" class="img-thumbnail">
                            @endempty
                            </td>
                            <td>{{ $product->category->name}}</td>
                            {{-- <td><a href="#" class="text-primary">{{ $product->desc }}</a></td> --}}
                            <td><a href="#" class="text-primary fw-bold">{{ $product->name }}</a></td>
                            <td>Rp. {{ number_format($product->price) }}</td>
                            <td>{{ $product->stok }}</td>
                            <td>{{ $product->sold }}</td>
                            <td>
                                <form method="POST" action=" {{ route('product.destroy',$product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete This Product?')" ><i class="bi bi-trash"></a></i></button> |
                                    <a class="btn btn-sm btn-warning" href="{{ url('admin/product-edit',$product->id) }}"><i class="bi bi-pencil"></i></a> |
                                    <a class="btn btn-sm btn-primary" href="{{ route('product.show',$product->id ) }}"><i class="bi bi-eye"></i></a> 
                                </form>
                            </td>
                        </tr>


                        @endforeach
                    </tbody>
                    </table>
    
                </div>
    
                </div>
            </div><!-- End Recent Sales -->
    
            {{-- <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body pb-0">
                    <h5 class="card-title">Top Selling <span>| Today</span></h5>
    
                    <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                        </tr>
                    </tbody>
                    </table>
    
                </div>
    
                </div>
            </div><!-- End Top Selling -->
    --}}
            </div>
        </div>
    </div>
</section>

@endsection