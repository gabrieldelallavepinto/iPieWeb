<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;

class ClinicaController extends Controller
{
  public function index()
  {
    return Clinica::all();
  }

  public function show($id)
  {
    return Clinica::find($id);
  }

  public function store(Request $request)
  {
    return Clinica::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = Clinica::find($id);
    $user->update($request->all());
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = Clinica::find($id);
    $article->delete();
    return 204;
  }
}
