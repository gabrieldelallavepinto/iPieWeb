<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCita;

class TipoCitaController extends Controller
{
  public function index()
  {
    return TipoCita::all();
  }

  public function show($id)
  {
    return TipoCita::find($id);
  }

  public function store(Request $request)
  {
    return TipoCita::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = TipoCita::find($id);
    $user->update($request->all());
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = TipoCita::find($id);
    $article->delete();
    return 204;
  }
}
