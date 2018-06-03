<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\TipoUsuario;

class UserController extends Controller
{
    public function index()
    {
      return User::all();
    }

    public function show($id)
    {
      return User::find($id);
    }

    public function store(Request $request)
    {
      return User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => Hash::make($request['password']),
          'tipo' => $request['tipo']
      ]);
    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      if($request['password'] != $user->password){
        $request['password'] =  Hash::make($request['password']);
      }
      $user->update($request->all());
      return $user;
    }

    public function delete(Request $request, $id)
    {
      $article = User::find($id);
      $article->delete();
      return 204;
    }

    public function save(Request $request)
    {
      $user = User::find($request['id']);
      if($user){
          $user = $this->update($request, $user->id);
      }else{
          $user = $this->store($request);
      }
      return redirect('/admin/users');

    }

    public function formUser(){
      $tipoUsuarios = TipoUsuario::all();
      $user = new User;
      return view('auth.register', ['tipoUsuarios' => $tipoUsuarios, 'user' => $user ]);
    }
    public function formUserId($id)
    {
      $tipoUsuarios = TipoUsuario::all();
      $user = User::find($id);
      return view('auth.register', ['tipoUsuarios' => $tipoUsuarios, 'user' => $user ]);
    }

    public function showUser($id)
    {
      return view('admin.showUser',['user' => $this->show($id)]);
    }

    public function saveUser(Request $request)
    {

      if ($request['id'] != "") {
          $user = $this->update($request,$request['id']);
      }
      else {
          $user = $this->store($request);
      }
      return redirect('/admin/showUser/'.$user->id);
    }

    public function users()
    {
      $users = $this->index();
      return view('admin.listUsers',['users' => $users]);
    }

    public function deleteUser($id)
    {
      $article = User::find($id);
      $article->delete();
      return redirect('/admin/users');
    }



}
