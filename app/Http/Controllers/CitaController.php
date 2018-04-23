<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;

class CitaController extends Controller
{
  public function index()
  {
    return Cita::all();
  }

  public function show($id)
  {
    return Cita::find($id);
  }

  public function store(Request $request)
  {
    return Cita::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = Cita::find($id);
    $user->update($request->all());
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = Cita::find($id);
    $article->delete();
    return 204;
  }
}
