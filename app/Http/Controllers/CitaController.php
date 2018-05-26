<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Cita;
use App\TipoCita;
use App\Cliente;
use App\Clinica;

class CitaController extends Controller
{
  public function index()
  {
    return Cita::all();
  }


  public function create()
  {
    $clinicas = Clinica::all();
    $tiposCita = TipoCita::select('id','nombre','color')->get();
    $cita = new Cita;
    $cliente = new Cliente;
    return view('citas.create', ['clinicas' => $clinicas, 'cita' => $cita, 'cliente' => $cliente, 'tiposCita' => $tiposCita]);
  }

  public function edit(Request $request)
  {
    $id = $request['id'];

    $tiposCita = TipoCita::select('id','nombre','color')->get();
    $cita = Cita::find($id);
    $clinicas = Clinica::all();
    $cliente = Cliente::find($cita->idCliente);
    return view('citas.create', ['clinicas' => $clinicas, 'cita' => $cita, 'cliente' => $cliente, 'tiposCita' => $tiposCita]);
  }


  public function store(Request $request)
  {

    $request['tiposCita'] = (int)$request['tiposCita'];

    $cliente = Cliente::find($request['idCliente']);
    if($cliente){
      $cliente->update($request->all());
      $cita = Cita::find($request['idCita']);
      $cita->update($request->all());
    }else{
      $cliente = Cliente::create($request->all());
      $request['idCliente']=$cliente->id;
      Cita::create($request->all());
    }

    return route('citas.edit');

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
