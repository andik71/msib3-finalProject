@extends('landingpage.index')
@section('content')
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 mt-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Payment</h3>

                            <hr class="border border-dark border-2 opacity-50 mb-2 mt-3">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('/public/admin/img/') }}/{{ $orders->photo }} "
                                        class="img-thumbnail">
                                </div>
                                <div class="col-4 ms-2">
                                    <p class="fw-bold">
                                        {{ $orders->product }} <br>
                                        <span class="fw-normal">Rp. {{ number_format($price) }}</span> <br>
                                        <span class="fw-normal">{{ $orders->order_quantity }} Item</span> <br>
                                        <span class="fw-normal">Shipping Cost : Rp. {{ number_format($shipping) }}</span> <br>

                                    </p>
                                </div>
                                <input type="hidden" name="total" value="{{ $orders->total_price }}">
                                <div class="d-flex justify-content-end">
                                    <button id="pay-button" class="btn btn-success">Choose Payment</button>
                                <form action="" id="submit_form" method="POST">
                                    @csrf
                                    <input type="hidden" name="json" id="json_callback">
                                    <input type="hidden" name="orders_id" value="{{$orders->id}}">
                                    <input type="hidden" name="products" value="{{$orders->product}}">
                                    <input type="hidden" name="price" value="{{$orders->total_price}}">
                                    <input type="hidden" name="quantity" value="{{$orders->order_quantity}}">
                                    <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                    <input type="hidden" name="phone" value="{{Auth::user()->phone_number}}">
                                    <input type="hidden" name="total_price" id="total_price" value="{{$price}}" >
                                    <input type="hidden" name="shipping" id="shipping" value="{{$shipping}}" >
                                    <input type="hidden" name="status" value="paid">
                                </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    // console.log(result);
                    send_response_to_form(result);

                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    // console.log(result);
                    send_response_to_form(result);

                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    // console.log(result);
                    send_response_to_form(result);

                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

        function send_response_to_form(result){
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();

        }
    </script>
@endsection
