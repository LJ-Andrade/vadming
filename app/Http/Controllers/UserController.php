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
        return view('vadmin.users.index')->with('users', $users);
    }

    public function show($id)
    {
        //
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
        //
    }

    public function update(Request $request, $id)
    {
        //
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
