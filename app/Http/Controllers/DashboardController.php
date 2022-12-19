<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\VersionUpdater\Checker;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        $sale = Orders::count();
        $sales = DB::table('checkout')->select('id')->get();

        $revenue = DB::table('checkout')->sum('checkout.total_price');
        $revenues = DB::table('orders')->select('id','total_price','users_id')->get();

        $customer = User::count();
        $customers = DB::table('users')->select('id')->get();

        return view('admin.home', compact('sales','sale','revenues','revenue','customers','customer'));
    }

    public function notifChart(){

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
        
        return view('landingpage.home', compact('cart', 'carts'));

    }

    public function about(){

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

        return view('landingpage.about', compact('cart','carts'));
    }

    public function contact(){
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

        return view('landingpage.contact', compact('cart', 'carts'));
    }

    public function index_home()
    {
        $categories = Category::all();

        $products = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->join('store', 'store.id', '=', 'products.store_id')
            ->select('products.*', 'category.name AS category', 'store.name AS shop', 'store.rating', 'store.location')
            ->whereBetween('category_id', [1, 3])
            ->whereIn('products.id', [1, 2, 3])->get();

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


        return view('landingpage.home', compact('categories', 'products', 'cart', 'carts'));
    }

    public function registered()
    {
        $categories = Category::all();

        $products = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->join('store', 'store.id', '=', 'products.store_id')
            ->select('products.*', 'category.name AS category', 'store.name AS shop', 'store.rating', 'store.location')
            ->whereBetween('category_id', [1, 3])
            ->whereIn('products.id', [1, 2, 3])->get();

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


        return view('landingpage.registered', compact('categories', 'products', 'cart', 'carts'));
    }

    public function myCart()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;

            $cart = DB::table('orders')
            ->where('users_id', '=', $id)
                ->sum('order_quantity');

            $carts = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.products_id')
            ->select('products.name', 'products.photo', 'orders.total_price', 'orders.order_quantity','orders.id')
            ->where('orders.users_id', '=', $id)->get();
        } else {
            $cart = [];
            $carts = [];
        }

        return view('landingpage.cart', compact('cart', 'carts'));
    }

    public function myOrders()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;

            $cart = DB::table('orders')
            ->where('users_id', '=', $id)
                ->sum('order_quantity');

            $carts = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.products_id')
            ->select('products.name', 'products.photo', 'orders.total_price', 'orders.order_quantity','orders.id')
            ->where('orders.users_id', '=', $id)->get();

            $orders = DB::table('checkout')
            ->join('orders', 'orders.id', '=', 'checkout.orders_id')
            ->join('products', 'products.id', '=', 'orders.products_id')
            ->select('products.name', 'products.photo', 'checkout.*','orders.id','order_quantity')
            ->where('orders.users_id', '=', $id)
            ->orderBy('checkout.id','DESC')->get();

            // dd($orders);

        } else {
            $cart = [];
            $carts = [];
        }

        return view('landingpage.orders', compact('cart', 'carts','orders'));
    }
}
