<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\TipoCita;
use App\Cliente;

class CitaController extends Controller
{
  public function index()
  {
    return Cita::all();
  }


  public function create()
  {
    $tiposCita = TipoCita::select('id','nombre','color')->get();
    $cita = new Cita;
    $cliente = new Cliente;
    return view('citas.create', ['cita' => $cita, 'cliente' => $cliente, 'tiposCita' => $tiposCita]);
  }

  public function edit(Request $request)
  {
    $id = $request['id'];
    
    $tiposCita = TipoCita::select('id','nombre','color')->get();
    $cita = Cita::find($id);
    $cliente = Cliente::find($cita->idCliente);
    return view('citas.create', ['cita' => $cita, 'cliente' => $cliente, 'tiposCita' => $tiposCita]);
  }


  public function store(Request $request)
  {
    
    return Cita::create($request->all());
  }


  public function show($id)
  {
    return Cita::find($id);
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

  public function showByDate($date){
    return Cita::whereDate('fecha', $date)->get();
  }
}
