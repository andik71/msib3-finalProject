<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('products')
        ->join('category', 'category.id', '=', 'products.category_id')
        ->join('store', 'store.id', '=', 'products.store_id')
        ->select(
            'products.id',
            'products.name AS product',
            'products.desc as deskripsi',
            'products.price',
            'products.stok',
            'products.sold',
            'products.photo',
            'category.name AS category',
            'store.name AS shop'
        )->get();
        
        return new ProductResource(true, 'Data Products', $products);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'nullable|max:45',
            'name' => 'required|max:45',
            'desc' => 'nullable|max:50',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'sold' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category_id' => 'required|integer',
            'store_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //proses menyimpan data yg diinput
        $products = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'stok' => $request->stok,
            'sold' => $request->sold,
            'photo' => $request->photo,
            'category_id' => $request->category_id,
            'store_id' => $request->store_id,
        ]);

        return new ProductResource(true, 'Data Product Berhasil diinput', $products);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table('products')
        ->join('category', 'category.id', '=', 'products.category_id')
        ->join('store', 'store.id', '=', 'products.store_id')
        ->select(
            'products.id',
            'products.name AS product',
            'products.desc AS deskripsi',
            'products.price',
            'products.stok',
            'products.sold',
            'products.photo',
            'category.name AS category',
            'store.name AS shop'
        )
            ->where('products.id', '=', $id)
            ->get();

        return new ProductResource(true, 'Detail Data Products', $products);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete($id);

        return new ProductResource(true, 'Data Products Berhasil Dihapus', $product);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45',
            'desc' => 'nullable|max:50',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'sold' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category_id' => 'required|integer',
            'store_id' => 'required|integer',
        ]);

        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // $product = Product::find($id);
        // // $product->update($request->all());
        // // proses menyimpan data yg diinput
        $product = Product::whereId($id)->update([
            'name'=>$request->name,
            'desc'=>$request->deskripsi,
            'price'=>$request->price,
            'stok'=>$request->stok,
            'sold'=>$request->sold,
            'photo'=>$request->photo,
            'category_id'=>$request->category_id,
            'store_id'=>$request->store_id,
        ]);


        return new ProductResource(true, 'Data Product Berhasil diubah', $product);
    }
}
