@extends('landingpage.index')
@section('content')
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-7 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Checkout</h3>
                            
                            <div class="row g-3">
                                <h5 class="mb-1">Check Shipping Cost</h5>
                                <p class="mb-1 fw-normal">My address : <span class="fw-light"> {{ $orders->address }}</span></p>
                                <hr class="border border-dark border-1 opacity-50 mb-2">
                                
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PROVINSI ASAL</label>
                                        <select class="form-control provinsi-asal" name="province_origin">
                                            <option value="0">-- pilih provinsi asal --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PROVINSI TUJUAN</label>
                                        <select class="form-control provinsi-tujuan" name="province_destination">
                                            <option value="0">-- pilih provinsi tujuan --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">KOTA / KABUPATEN ASAL</label>
                                        <select class="form-control kota-asal" name="city_origin">
                                            <option value="">-- pilih kota asal --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>
                                        <select class="form-control kota-tujuan" name="city_destination">
                                            <option value="">-- pilih kota tujuan --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Jasa Pengiriman</label>
                                        <select class="form-control kurir" name="courier">
                                            <option value="0">-- pilih kurir --</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">BERAT (GRAM)</label>
                                        <input type="number" value="1000" class="form-control" name="weight" id="weight"
                                            placeholder="Masukkan Berat (GRAM)">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <input type="hidden" id="orders_id" value={{ $orders->id }}>
                                    <input type="hidden" id="price" value={{ $orders->total_price }}>
                                    <button class="btn btn-md btn-success btn-block btncheck">Check</button>
                                </div>
                            </div>

                            <hr class="border border-dark border-2 opacity-50 mb-2 mt-3">

                            <p><i class="fa fa-store-alt me-2"></i>
                                {{ $orders->shop }} <br>
                                <span class="text-muted">Kota {{ $orders->location }}</span>
                            </p>

                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('/public/admin/img/') }}/{{ $orders->photo }} " class="img-thumbnail">
                                </div>
                                <div class="col-4 ms-2">
                                    <p class="fw-bold">
                                        {{ $orders->product }} <br>
                                        <span class="fw-normal">Rp. {{ number_format($orders->total_price) }}</span> <br>
                                        <span class="fw-normal">{{ $orders->order_quantity }} Item</span>
                                    </p>
                                </div>
                                <div class="col-4 ms-3 align-items-center">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Choose Duration</label>
                                        <select name="ongkir" class="form-control ongkir">
                                            <option value="">-- Shipping --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Shopping Summery</h3>
                            <div class="row">
                                <div class="col-6">
                                    <p>Total Price ({{$orders->order_quantity}} Product)</p>
                                </div>
                                <div class="col-6">
                                    <span class="ms-5">Rp {{number_format($orders->total_price)}}</span>
                                </div>
                                <div class="col-6">
                                    <p>Total Shipping</p>
                                </div>
                                <div class="col-6">
                                    <span class="ms-5 shipping"></span>
                                </div>
                                <hr class="border border-dark border-1 opacity-50 mb-2">
                                <div class="col-6">
                                    <p>Grand Total</p>
                                </div>
                                <div class="col-6">
                                    <span class="ms-5 price"></span>
                                </div>
                                <form method="GET" action="{{ url('checkout/payment',$orders->id) }}" enctype = "multipart/form-data">
                                    {{-- @csrf --}}
                                    <input type="hidden" name="orders_id" value="{{$orders->id}}">
                                    <input type="hidden" name="products" value="{{$orders->product}}">
                                    <input type="hidden" name="price" value="{{$orders->price}}">
                                    <input type="hidden" name="quantity" value="{{$orders->order_quantity}}">
                                    <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                    <input type="hidden" name="phone" value="{{Auth::user()->phone_number}}">
                                    <input type="hidden" name="total_price" id="total_price" value="" >
                                    <input type="hidden" name="shipping" id="shipping" value="" >
                                    <input type="hidden" name="status" value="paid">
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-lg btn-success">Buy ({{$orders->order_quantity}})</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
        </div>
    </section>

    {{-- <script type="text/javascript">

    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function() {
            //active select2
            $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan, .kurir, .ongkir").select2({
                theme: 'bootstrap4',
                width: 'style',
            });
            //ajax select kota asal
            $('select[name="province_origin"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: 'cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_origin"]').empty();
                            $('select[name="city_origin"]').append(
                                '<option value="">-- pilih kota asal --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_origin"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').append(
                        '<option value="">-- pilih kota asal --</option>');
                }
            });
            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: 'cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append(
                                '<option value="">-- pilih kota tujuan --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_destination"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append(
                        '<option value="">-- pilih kota tujuan --</option>');
                }
            });
            //ajax check ongkir
            let isProcessing = false;
            $('.btncheck').click(function(e) {
                e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = $('select[name=city_origin]').val();
                let city_destination = $('select[name=city_destination]').val();
                let courier = $('select[name=courier]').val();
                let weight = $('#weight').val();

                if (isProcessing) {
                    return;
                }

                let id = $("#orders_id").val();
                let price = $("#price").val();
                isProcessing = true;
                jQuery.ajax({
                    url: id,
                    data: {
                        _token: token,
                        city_origin: city_origin,
                        city_destination: city_destination,
                        courier: courier,
                        weight: weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function(response) {
                        console.log(response);
                        isProcessing = false;
                        if (response) {
                            let datas = response[0]['costs'];;
                            console.log(datas);
                            // console.log(price);
                            $('.ongkir').empty();
                            $('.price').empty();
                            // $('.ongkir').addClass('d-block');
                            // $.each(datas, function(key, value) {
                            //     $('#ongkir').append('<li class="list-group-item">' +
                            //         response[0].code.toUpperCase() + ' : <strong>' +
                            //         value.service + '</strong> - Rp. ' + value.cost[
                            //             0].value + ' (' + value.cost[0].etd +
                            //         ' hari)</li>')
                            // });

                            $('.ongkir').append(
                                `<option value="">-- Shipping --</option>`);

                            datas.forEach(data => {
                                $('.ongkir').append(`
                                    <option value="${data.cost[0].value}">
                                        ${data.service} : Rp. ${data.cost[0].value} (${data.cost[0].etd} hari)
                                    </option>`);

                                
                            });
                            
                            const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                style: "currency",
                                currency: "IDR"
                                }).format(number);
                            }

                            $('select[name="ongkir"]').on('change',function(){
                                    let ongkir = $(this).val();
                                    let total = parseInt(ongkir) + parseInt(price);

                                    console.log(rupiah(ongkir));
                                    console.log(total);
                                    $('.price').append(` ${rupiah(total)}`);
                                    $('.shipping').append(` ${rupiah(ongkir)}`);
                                    $('#total_price').val(`${total}`);
                                    $('#shipping').val(`${ongkir}`);

                                })

                        }
                    }
                });
            });
        });

    </script>
@endsection
