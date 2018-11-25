<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //$users = DB::table('users')->get();
        $title = 'Listado de usuarios';
        
    return view('users.index',compact('title','users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => 'required'
        ],[
            'name.required' => 'El campo nombre es Requerido'
        ]);
        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> $data['password']     
        ]);
        
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
      return view('users.edit',['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ''
        ],[
            'name.required' => 'El campo nombre es Requerido'
        ]);
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
       
        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
