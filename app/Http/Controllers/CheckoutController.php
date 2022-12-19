<?php

namespace App\Http\Controllers;

use App\Exports\CheckoutExport;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = DB::table('checkout')
            ->join('orders', 'checkout.orders_id', '=', 'orders.id')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->select('checkout.*','users.name','users.address')
            // ->orderBy('checkout.orders_id','ASC')
            ->get();

        // dd($checkouts);

        return view('admin.checkout.index', compact('checkouts'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $orders = Orders::all();

        return view('admin.checkout.add', compact('users','orders'));
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
            'orders_id' => 'required|integer',
            'status' => 'required',
            'total_price' => 'required',
            'users_id' => 'required',
        ]);

        DB::table('checkout')->insert(
            [
                'orders_id' => $request->orders_id,
                'status' => $request->status,
                'total_price' => $request->total_price,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Added Transaction Success', 'Data Transaction Successfully Added');
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkout = DB::table('checkout')
                    ->join('users as u', 'checkout.users_id', '=', 'u.id')
                    ->select('u.*', 'checkout.*',)
                    ->where('checkout.id', '=', $id)->first();
        
        // dd($checkout);

        return view('admin.checkout.detail', compact('checkout','checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.checkout.edit', [
            'checkout' => Checkout::find($id),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'orders_id' => 'required|integer',
            'status' => 'required',
            'total_price' => 'required',
            'users_id' => 'required',
        ]);

        DB::table('checkout')->where('id', $id)->update(
            [
                'orders_id' => $request->orders_id,
                'status' => $request->status,
                'total_price' => $request->total_price,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Updated Transaction Success', 'Data Transaction Successfully Updated');
        return redirect('admin/transaction' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        checkout::find($id);

        checkout::where('id', $id)->delete();
        return response()->json(['status' => 'Data Transaction Succesfully Deleted']);


        // return redirect()->route('checkout.index')->with('success', 'Data checkout Succesfully Deleted');
    }

    public function generatePDF()
    {
        $checkouts = DB::table('checkout')
        ->join('users', 'users.id', '=', 'checkout.users_id')
        ->select('users.*', 'checkout.*')
        ->get();


        $data = [
            'date' => date('m/d/y'),
            'checkouts' => $checkouts
        ];

        $pdf = Pdf::loadView('admin.checkout.transaction-pdf', $data);

        return $pdf->stream('transaction.pdf');
    }


    public function generateCSV()
    {
        return Excel::download(new CheckoutExport, 'transaction.xlsx');
    }
}
