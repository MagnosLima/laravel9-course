<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        //$user = new User;
        $this->model = $user;
    }
    public function index(Request $request)
    {
        //dd($request->search);
        //$filtro = $request->search;
        //dd($filtro);
        //$users = User::where('name', 'LIKE', "%{$request->search}%")->get();
        //$search = $request->search;
        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''  //get('search', '')
                        );
        //dd($users);
        //$users = User::get();
        //dd($users); 
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //dd('UserController@show', $id);
        //$user = User::where('id', $id)->first();
        if(!$user = $this->model->find($id))
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

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $this->model->create($data);
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

    public function edit($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');        

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');        

        $this->model->UpdateUser($request, $user);
        /*$data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);*/
        //dd($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id))
            //return redirect()->back();
            return redirect()->route('users.index');    

        $user->delete();  

        return redirect()->route('users.index');    
    }
}
