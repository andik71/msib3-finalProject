<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.category', [
            'categories' => Category::all()
        ]);
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);


        if (!empty($request->photo)) {
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }

        DB::table('category')->insert(
            [
                'name' => $request->name,
                'photo' => $fileName,
            ]
        );

        Alert::success('Added Category Success', 'Data Category Successfully Added');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit',[
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $photo = DB::table('category')->select('photo')->where('id', $id)->get();
        foreach ($photo as $p) {
            $oldPhoto = $p->photo;
        }
        //------------apakah user ingin ganti foto lama-----------
        if (!empty($request->photo)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($category->photo)) unlink('public/admin/img/' . $category->photo);
            //proses foto lama ganti foto baru
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = $oldPhoto;
        }

        DB::table('category')->where('id', $id)->update(
            [
                'name' => $request->name,
                'photo' => $fileName,
            ]
        );

        Alert::success('Updated Category Success', 'Data Category Successfully Updated');
        return redirect('admin/category' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id);
        
        Category::where('id', $id)->delete();
        return response()->json(['status' => 'Data Category Succesfully Deleted']);


        return redirect()->route('category.index')->with('success', 'Data Category Succesfully Deleted');
    
}
}
