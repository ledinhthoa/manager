<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class quanlicontroller extends Controller
{
    public function index(){
    $users=User::all();

        return view('quanli.quanliusers',compact('users'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        //xoa khach hang thuoc tinh thanh nay
        $user->delete();
        //cap nhat xong quay ve trang danh sach tinh thanh
        return redirect()->route('quanli.index');
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('quanli.editUsers', compact('user'));
    }
    public function update(Request $request, $id){
        $users = User::findOrFail($id);
        $users->name     = $request->input('name');
        $users->email    = $request->input('email');
        $users->email_verified_at= $request->input('email_verified_at');
        $users->password  = $request->input('password');
        $users->save();

        //dung session de dua ra thong bao

        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('quanli.index');
    }
}
