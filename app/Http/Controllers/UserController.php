<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; 

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        //dd($users); 
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }

    public function show($id){
        //dd('UserController@show', $id);
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id))
            //return redirect()->back();
            return redirect()->route('users.index');        

        //dd($user);
        //dd('users.show', $id);
        return view('users.show', compact('user'));
    }
}
