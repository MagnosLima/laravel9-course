<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; 

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        //dd($users); 
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //dd('UserController@show', $id);
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id))
            //return redirect()->back();
            return redirect()->route('users.index');        

        //dd($user);
        //dd('users.show', $id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        //$user = User::create($request->all());

        return redirect()->route('users.index');
        //return redirect()->route('users.show'. $user->id);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        //dd($request->all());
        /*dd($request->only(
            [
                'name', 'email', 'password'
            ]
        ));*/
        //dd('cadastrando o usuário');
    }
}
