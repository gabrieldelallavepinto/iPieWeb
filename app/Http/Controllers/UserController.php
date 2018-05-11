<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

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
      ]);
    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $request['password'] =  Hash::make($request['password']);
      $user->update($request->all());
      return $user;
    }

    public function delete(Request $request, $id)
    {
      $article = User::find($id);
      $article->delete();
      return 204;
    }

    public function formUser(){
      return view('admin.formUser', ['api_token' => Session::get('api_token')]);
    }
    public function formUserId($id)
    {
      return view('admin.formUser', ['api_token' => Session::get('api_token'), 'user' => $this->show($id)]);
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



}
