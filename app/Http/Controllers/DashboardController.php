<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        $sale = Checkout::count();
        $sales = DB::table('checkout')->select('id')->get();

        $revenue = DB::table('checkout')->sum('checkout.total_price');
        $revenues = DB::table('checkout')->select('id','total_price','users_id')->get();

        $customer = User::count();
        $customers = DB::table('users')->select('id')->get();

        return view('admin.home', compact('sales','sale','revenues','revenue','customers','customer'));
    }
}
