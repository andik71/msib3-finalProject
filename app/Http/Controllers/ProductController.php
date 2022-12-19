<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.allproduct', compact('products') );
    }

    public function indexShop()
    {   
        $search = request('search');

        if ($search) {
            $products = Product::where('name','like','%'.$search.'%')->get();
        }else{
            $products = Product::orderBy('id', 'DESC')->get();
        }

        if (Auth::user()) {
            $id = Auth::user()->id;

            $cart = DB::table('orders')
                    ->where('users_id','=',$id)
                    ->sum('order_quantity');

            $carts = DB::table('orders')
                ->join('products', 'products.id', '=', 'orders.products_id')
                ->select('products.name', 'products.photo', 'orders.total_price', 'orders.order_quantity')
                ->where('orders.users_id', '=', $id)->get();
        } else {
            $cart = [];
            $carts = [];
        }

        return view('landingpage.shop', compact('products','cart','carts'));
    }

    public function smartphone()
    {
        $search = request('search');

        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::where('category_id','1')->orderBy('id', 'DESC')->get();
        }

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

        return view('landingpage.shop', compact('products', 'cart', 'carts'));
    }

    public function pc()
    {
        $search = request('search');

        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::where('category_id','3')->orderBy('id', 'DESC')->get();
        }

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

        return view('landingpage.shop', compact('products', 'cart', 'carts'));
    }
    public function laptop()
    {
        $search = request('search');

        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::where('category_id','2')->orderBy('id', 'DESC')->get();
        }

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

        return view('landingpage.shop', compact('products', 'cart', 'carts'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $store = Store::all();

        return view('admin.product.addproduct',compact('category', 'store'));
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
            'name' => 'required|max:45',
            'desc' => 'required|max:500',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'sold' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category_id' => 'required|integer',
            'store_id' => 'required|integer',
        ]);


        if(!empty($request->photo)){
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('admin/img'), $fileName);

        }else{
            $fileName = '';
        }

        DB::table('products')->insert(
            [
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'stok' => $request->stok,
                'sold' => $request->sold,
                'photo' => $fileName,
                'category_id' => $request->category_id,
                'store_id' => $request->store_id,
            ]
        );

        Alert::success('Added Product Success', 'Data Products Successfully Added');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.detailproduct', compact('product'));
    }

    public function detailShop($id)
    {
        $product = Product::find($id);

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

        return view('landingpage.shop-single', compact('product','cart','carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.editproduct',[
            'product' => Product::find($id),
            'categories' => Category::all(),
            'stores' => Store::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'desc' => 'required|max:500',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'sold' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category_id' => 'required|integer',
            'store_id' => 'required|integer',
        ]);

        $photo = DB::table('products')->select('photo')->where('id', $id)->get();
        foreach ($photo as $p) {
            $oldPhoto = $p->photo;
        }
        //------------apakah user ingin ganti foto lama-----------
        if (!empty($request->photo)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($product->photo)) unlink('admin/img/' . $product->photo);
            //proses foto lama ganti foto baru
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('admin/img'), $fileName);
        }
        else {
            $fileName = $oldPhoto;
        }

        DB::table('products')->where('id', $id)->update(
            [
                //'nip'=>$request->nip,
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'stok' => $request->stok,
                'sold' => $request->sold,
                'photo' => $fileName,
                'category_id' => $request->category_id,
                'store_id' => $request->store_id,
            ]
        );

        Alert::success('Update Products Success', 'Data Products Successfully Updated');
        return redirect('admin/product' . '/' . $id)->with('success', 'Data Product Succesfully Updated');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return response()->json(['status' => 'Data Product Succesfully Deleted']);
        // return redirect()->route('product.index')->with('success','Data Product Succesfully Deleted');
    
    }

    public function generatePDF()
    {
        $product = Product::all();

        $data = [
            'date' => date('m/d/y'),
            'products' => $product
        ];

        $pdf = Pdf::loadView('admin.product.product-pdf',$data);

        return $pdf->stream('data_products.pdf');
    }


    public function generateCSV(){
        return Excel::download(new ProductExport, 'data_products.xlsx');
    }

    public function addCart(Request $request){

        $quantity = $request->order_quantity;
        $total = $request->total_price * $quantity;

        DB::table('orders')->insert(
            [
                'order_quantity' => $request->order_quantity,
                'total_price' => $total,
                'products_id' => $request->products_id,
                'users_id' => $request->users_id,
            ]
        );

        Alert::success('Added To My Cart', 'Products Successfully Added To Cart');
        return redirect('/cart');

    }

}