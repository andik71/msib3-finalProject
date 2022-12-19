<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Checkout;
use App\Models\City;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                ->join('users','orders.users_id','=','users.id')
                ->join('products','orders.products_id','=','products.id')
                ->select('orders.order_quantity','orders.total_price','orders.id','users.name','products.name as product')
                ->orderBy('orders.id', 'DESC')->get();

        // dd($orders);

        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Orders::all();
        $products = Product::all();
        $users = User::all();

        return view('admin.orders.add', compact('orders','products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_quantity' => 'required|integer',
            'total_price' => 'required|integer',
            'products_id' => 'required',
            'users_id' => 'required',
        ]);

        DB::table('orders')->insert(
            [
                'order_quantity' => $request->order_quantity,
                'total_price' => $request->total_price,
                'products_id' => $request->products_id,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Added Orders Success', 'Data Orders Successfully Added');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = DB::table('orders')
                        ->join('users as u','orders.users_id','=','u.id')
                        ->join('products as p','orders.products_id','=','p.id')
                        ->select('u.*','orders.*','p.name as product','p.photo')
                        ->where('orders.id','=',$id)->first();

        return view('admin.orders.detail', compact('orders'));
    }

    public function addCheckout(Request $request, $id){

        $request->validate([
            'total_price' => 'required|integer',
        ]);

        DB::table('checkout')->insert(
            [
                'status' => $request->status,
                'total_price' => $request->total_price,
                'orders_id' => $request->orders_id,
                'users_id' => $request->users_id,
            ]
        );

        return redirect('checkout/payment' . '/' . $id);
    }

    public function payment(Request $request, $id){

        // dd($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-QF3qp3WF0to4upaQsN4Czuh9';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $total = $request->price + $request->shipping;

        if(!empty($total)){
            $total = $request->total_price;
        }else{
            $total = 100000;
        }

        $price = $request->price;
        $shipping = $request->shipping;
        // dd($request->all());

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'item_details' => array(
                [
                    'id' => 'a1',
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'name' =>  $request->products
                ],[
                    'id' => 'b1',
                    'price' =>  $shipping,
                    'quantity' => 1,
                    'name' => 'Ongkir'
                ]
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'email' =>  $request->email,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $orders = DB::table('orders')
            ->join('users as u', 'orders.users_id', '=', 'u.id')
            ->join('products as p', 'orders.products_id', '=', 'p.id')
            ->select('u.*', 'orders.*', 'p.name as product', 'p.price', 'p.photo')
            ->where('orders.id', '=', $id)->first();

        // dd($checkout);

        if (Auth::user()) {
            $id = Auth::user()->id;

            $cart = DB::table('orders')
                ->where('users_id', '=', $id)
                ->sum('order_quantity');

            $carts = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.products_id')
            ->select('products.name', 'products.photo', 'orders.total_price', 'orders.order_quantity')
            ->where('orders.users_id', '=', $id)->get();
        } else {
            $cart = [];
            $carts = [];
        }

        return view('landingpage.payment',  ['snap_token' => $snapToken], 
        compact('cart', 'carts', 'orders', 'price','shipping'));

    }

    public function payment_post(Request $request, $id)
    {
        $json = json_decode($request->get('json'));

        // dd($json);

        DB::table('checkout')->insert(
            [
                'code' => $json->order_id,
                'status' => $json->status_message,
                'payment_type' => $json->payment_type,
                'payment_code' => $json->payment_code,
                'invoice' => $json->pdf_url,
                'total_price' => $json->gross_amount,
                'time' => $json->transaction_time,
                'orders_id' => $request->orders_id,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Payment Success', 'payment has been successfully processed');
        return redirect()->route('myorders');
    }

    public function checkout(Request $request, $id)
    {

        $provinces = Province::pluck('name', 'province_id');
        $orders = DB::table('orders')
                        ->join('users as u','orders.users_id','=','u.id')
                        ->join('products as p','orders.products_id','=','p.id')
                        ->join('store as s','p.store_id','=','s.id')
                        ->select('u.*','orders.*','p.name as product','p.price','p.photo','s.name as shop','s.location')
                        ->where('orders.id','=',$id)->first();

        if (Auth::user()) {
            $id = Auth::user()->id;


            $cart = DB::table('orders')
                ->where('users_id', '=', $id)
                ->sum('order_quantity');

            $carts = DB::table('orders')
                ->join('products', 'products.id', '=', 'orders.products_id')
                ->select('products.name', 'products.photo', 'orders.total_price', 'orders.order_quantity')
                ->where('orders.users_id', '=', $id)->get();
        } else {
            $cart = [];
            $carts = [];
        }
        return view('landingpage.checkout', compact('orders','cart','carts','provinces'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        return response()->json($cost);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.orders.edit', [
            'orders' => Orders::find($id),
            'products' => Product::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_quantity' => 'required|integer',
            'total_price' => 'required|integer',
            'products_id' => 'required',
            'users_id' => 'required',
        ]);

        DB::table('orders')->where('id', $id)->update(
            [
                'order_quantity' => $request->order_quantity,
                'total_price' => $request->total_price,
                'products_id' => $request->products_id,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Updated Orders Success', 'Data Orders Successfully Updated');
        return redirect('admin/orders' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orders::find($id);

        Orders::where('id', $id)->delete();
        return response()->json(['status' => 'Data Orders Succesfully Deleted']);


        // return redirect()->route('orders.index')->with('success', 'Data Orders Succesfully Deleted');
    }

    public function destroyCart($id)
    {
        Orders::find($id);

        Orders::where('id', $id)->delete();
        return response()->json(['status' => 'Your Cart Succesfully Removed']);

    }

    public function destroyOrders($id)
    {
        Orders::find($id);

        Checkout::where('id', $id)->delete();
        return response()->json(['status' => 'Your Orders Succesfully Removed']);

    }

    public function generatePDF()
    {
        $order = DB::table('orders')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->join('products', 'orders.products_id', '=', 'products.id')
            ->select('orders.*', 'users.*', 'products.name as product')->get();

        $data = [
            'date' => date('m/d/y'),
            'orders' => $order
        ];

        $pdf = Pdf::loadView('admin.orders.orders-pdf', $data);

        return $pdf->stream('orders.pdf');
    }


    public function generateCSV()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
