<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.index',['users'=>$users]);
    }

    public function update(Request $request){
        $id = $request->id;
        DB::table('users')->where('id', $id)->update(['first_name'=>$request->first_name,
            'last_name'=>$request->last_name, 'phone'=>$request->phone, 'email'=>$request->email,
            'username'=>$request->username, 'role'=>$request->role]);

        return back()->withUpdate('success');
    }

    public function delete(Request $request){
        $id = $request->id;
        DB::table('users')->delete($id);
        return back()->withDelete('success');
    }
}
