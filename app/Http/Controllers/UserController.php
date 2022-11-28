<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $approval = DB::table('users')->where('isactive','=','0')->get();

        return view('admin.user.index', compact('users', 'approval'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function userprofile($id)
    {
        $user = User::find($id);
        return view('admin.user.profile', compact('user'));
    }

    public function changepassword($id)
    {
        $user = User::find($id);
        return view('admin.user.change-password', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => User::find($id)
        ]);
    }

    public function editprofile($id)
    {
        return view('admin.user.edit-profile', [
            'user' => User::find($id)
        ]);
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'address' => 'required|max:45',
            'phone_number' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $photo = DB::table('users')->select('photo')->where('id', $id)->get();
        foreach ($photo as $p) {
            $oldPhoto = $p->photo;
        }
        //------------apakah user ingin ganti foto lama-----------
        if (!empty($request->photo)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($user->photo)) unlink('public/assets/img/' . $user->photo);
            //proses foto lama ganti foto baru
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('assets/img'), $fileName);
        } else {
            $fileName = $oldPhoto;
        }

        DB::table('users')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'photo' => $fileName,
            ]
        );

        Alert::success('Updated User Success', 'Data User Successfully Updated');

        return redirect('admin/user/profile'.'/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'role' => 'required',
            'isactive' => 'required',
        ]);

        DB::table('users')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'isactive' => $request->isactive,
            ]
        );

        Alert::success('Updated User Success', 'Data User Successfully Updated');

        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->json(['status' => 'Data User Succesfully Deleted']);
    }
}
