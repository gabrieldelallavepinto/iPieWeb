<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
  public function index()
  {
    return Cliente::all();
  }

  public function show($id)
  {
    return Cliente::find($id);
  }

  public function store(Request $request)
  {
    return Cliente::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = Cliente::find($id);
    $user->update($request->all());

    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = Cliente::find($id);
    $article->delete();
    return 204;
  }
}
