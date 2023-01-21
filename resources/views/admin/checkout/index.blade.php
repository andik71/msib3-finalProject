@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Transaction</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Transaction</li>
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
                    <h5 class="card-title">Recent Transaction <span>| Today</span></h5>
                    <table class="table table-borderless datatable">
                        <div>
                            {{-- <a class="btn btn-sm btn-primary mb-2" href="{{ route('transaction.create') }}"  ><i class="bi bi-plus-lg"></i> Add Orders</a> --}}
                            <a class="btn btn-sm btn-danger mb-2 me-1" href="{{ url('admin/transaction-generate-pdf') }}" target="_blank" ><i class="bi bi-file-earmark-pdf-fill"></i> Export to PDF</a>
                            <a class="btn btn-sm btn-success mb-2" href="{{ url('admin/transaction-generate-csv') }}" target="_blank" ><i class="bi bi-file-earmark-excel-fill"></i> Export to Excel</a>
                        </div>

                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Billed To</th>
                        <th scope="col">Shipped To</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkouts as $checkout)
                        <tr>
                            <th scope="row"><a href="#">{{ $checkout->id}}</a></th>
                            <td>{{ $checkout->code}}</td>
                            <td>{{ $checkout->name}}</td>
                            <td>{{ $checkout->address}}</td>
                            <td>Rp.{{ number_format($checkout->total_price) }}</td>
                            <td>{{ $checkout->status}}</td>
                            <td>
                                <form method="POST" action="{{ route('transaction.destroy',$checkout->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" class="delete_id" value="{{ $checkout->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger btndelete"><i class="bi bi-trash"></i></button> |
                                    <a class="btn btn-sm btn-warning" href="{{  url('admin/transaction-edit',$checkout->id) }}"><i class="bi bi-pencil"></i></a> |
                                    <a class="btn btn-sm btn-primary" href="{{ route('transaction.show',$checkout->id ) }}"><i class="bi bi-eye"></i></a> 

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
                    text: "After Deleted, You can't restore this Transaction again!",
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
                            url: 'transaction/destroy/' + deleteid,
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