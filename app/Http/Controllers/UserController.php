<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

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
      return view('admin.formUser');
    }

}
