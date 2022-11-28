<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Orders::all()
        ]);
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
        $checkout = Checkout::all();

        return view('admin.orders.add', compact('orders','products', 'checkout'));
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
            'checkout_id' => 'required',
        ]);

        DB::table('orders')->insert(
            [
                'order_quantity' => $request->order_quantity,
                'total_price' => $request->total_price,
                'products_id' => $request->products_id,
                'checkout_id' => $request->checkout_id,
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
        $orders = Orders::find($id);
        return view('admin.orders.detail', compact('orders'));
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
            'checkouts' => Checkout::all(),
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
            'checkout_id' => 'required',
        ]);

        DB::table('orders')->where('id', $id)->update(
            [
                'order_quantity' => $request->order_quantity,
                'total_price' => $request->total_price,
                'products_id' => $request->products_id,
                'checkout_id' => $request->checkout_id,
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

    public function generatePDF()
    {
        $order = Orders::all();

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
