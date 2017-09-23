<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DISPLAY
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        
        // $name  = $request->get('name');
        // $role  = $request->get('role');
        // $group = $request->get('group');
        // $perPage = 25;
        
        // if ($name != '' and $code != ''){
        //     // Search User AND Role
        //     $users = User::where('name', 'LIKE', "%$name%")->where('id', 'LIKE', "%$code%")
        //     ->paginate($perPage);
        // } else if ($name != '') {
        //     // Search by name
        //     $users = User::where('name', 'LIKE', "%$name%")->paginate($perPage);
            
        // } else if ($code !='') {
        //     // Search by Name or Email
        //     $users = User::where('id', '=', "$code")->paginate($perPage);
        // } else {
        //     // Search All
        //     // $clientes = Cliente::paginate($perPage);
        //     $users = User::orderBy('id', 'ASC')->paginate(10);
        // }
        
        return view('vadmin.users.index')->with('users', $users);

    }

    public function show($id)
    {
        $item = User::findOrFail($id);
        return view('vadmin.users.show', compact('item'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('vadmin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'           => 'required',
            'email'          => 'min:3|max:250|required|unique:users,email',
            'password'       => 'min:4|max:120|required|',
            
        ],[
            'email.required' => 'Debe ingresar un email',
            'email.unique'   => 'El email ya existe',
            'password'       => 'Debe ingresar una contraseña',
        ]);

        User::create($request->all());

        return redirect('vadmin/users')->with('message', 'Usuario agregado correctamente');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('vadmin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $item = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|max:255',
            'username' => 'required|max:20|unique:users,username,'.$item->id,
            'email' => 'required|email|max:255|unique:users,email,'.$item->id,
            'password' => 'required|min:6|confirmed',
            
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'username.required' => 'Debe ingresar un nombre de usuario',
            'username.unique' => 'El nombre de usuario ya está siendo utilizado',
            'email.required' => 'Debe ingresar un email',
            'email.unique' => 'El email ya existe',
            'password.min' => 'El password debe tener al menos :min caracteres',
            'password.required' => 'Debe ingresar una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $item->fill($request->all());
        $item->save();

        return redirect('vadmin/users')->with('Message', 'Usuario '. $item->name .'editado correctamente');

    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        //
    }
}
