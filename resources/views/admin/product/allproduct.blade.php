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
                            <a class="btn btn-sm btn-primary mb-2 me-1" href="{{ route('product.create') }}" ><i class="bi bi-plus-lg"></i> Add Product</a>
                            <a class="btn btn-sm btn-danger mb-2 me-1" href="{{ url('admin/product-generate-pdf') }}" target="_blank" ><i class="bi bi-file-earmark-pdf-fill"></i> Export to PDF</a>
                            <a class="btn btn-sm btn-success mb-2" href="{{ url('admin/product-generate-csv') }}" target="_blank" ><i class="bi bi-file-earmark-excel-fill"></i> Export to Excel</a>
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
                            <input type="hidden" class="delete_id" value="{{ $product->id }}">
                            <th scope="row"><a href="#">{{ $product->code}}</a></th>
                            <td>
                            <img src="{{ url('public/admin/img')}}/{{$product->photo}}" width="70px" alt="product" class="img-thumbnail">
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
                                    <input type="hidden" class="delete_id" value="{{ $product->id }}">
                                    <button class="btn btn-sm btn-danger btndelete"><i class="bi bi-trash"></a></i></button> |
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
    

            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Are You Sure?",
                    text: "After Deleted, You can't restore this Product again!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'product/destroy/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });

</script>

@endsection