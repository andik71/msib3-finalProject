@extends('landingpage.index')
@section('content')
    <section class="bg-light">
        @if (count($orders)==0)
            <section class="container py-5">
                <div class="row text-center pt-5 pb-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="display-3 fw-bold mb-2">Your Orders is Empty!</h1>
                        <h5 class="fw-normal mt-3 mb-5">
                            Let's Start Shopping Now.
                        </h5>

                        <a class="btn btn-success" href="{{ url('/shop') }}">Shopping</a>
                    </div>
                </div>
            </section>
        @else
            <div class="container pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">My Orders</h3>

                                @foreach ($orders as $item)
                                    <div class="row mt-3">
                                        <div class="col-3 ms-3 mt-3">
                                            <img src="{{ asset('/public/admin/img/') }}/{{ $item->photo }} "
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-7 mt-3 ms-5 align-items-center">
                                            <p>
                                                Date : {{$item->time}} <br>
                                                Status : <span>{{$item->status}}</span>
                                            </p>
                                            <p class="fw-bold">
                                                {{ $item->name }} <br>
                                                <span class="fw-normal">Rp. {{ number_format($item->total_price) }}</span> <br>
                                                <span class="fw-normal">{{ $item->order_quantity }} Item</span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="border border-success border-2 opacity-50 mb-3">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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

            var deleteid = $(this).closest("form").find('.delete_id').val();
            console.log(deleteid);

            swal({
                    title: "Are You Sure?",
                    text: "After Removed, You can't restore this Orders again!",
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
                            url: 'orders/destroy/' + deleteid,
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
