<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class NotaController extends Controller
{
  public function index()
  {
    return Nota::all();
  }

  public function show($id)
  {
    return Nota::find($id);
  }

  public function store(Request $request)
  {
    return Nota::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = Nota::find($id);
    $user->update($request->all());
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = Nota::find($id);
    $article->delete();
    return 204;
  }

  public function showByDate($date){
    return Nota::whereDate('fecha', $date)->get();
  }
}
