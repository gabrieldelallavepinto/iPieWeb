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
    $idCita = $request['idCita'];

    $tiposCita = TipoCita::select('id','nombre','color')->get();
    $cita = Cita::find($idCita);
    $clinicas = Clinica::all();
    $cliente = Cliente::find($cita->idCliente);
    return view('citas.edit', ['clinicas' => $clinicas, 'cita' => $cita, 'cliente' => $cliente, 'tiposCita' => $tiposCita]);
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

  public function showByDateClinica($clinica, $date){
    return Cita::whereDate('fecha', $date)->where('idClinica','=',$clinica)->get();
  }

  public function showByDatePodologo($podologo, $date){
    return Cita::whereDate('fecha', $date)->where('idPodologo','=',$podologo)->get();
  }

  public function showByDatePodologoClinica($podologo, $clinica, $date){
    return Cita::whereDate('fecha', $date)->where('idClinica','=',$clinica)->where('idPodologo','=', $podologo)->get();
  }

  public function formCita(){
    return view('citas.form', ['fecha' => date("Y-m-d"), 'tiposCita' => TipoCita::all()]);
  }
  public function formCitaId($id)
  {
    $cita = $this->show($id);
    return view('citas.form', [ 'cita' => $cita, 'fecha' => date("Y-m-d"), 'cliente' => Cliente::find($cita->idUsuario), 'tiposCita' => TipoCita::all()]);
  }

  public function showCita($id)
  {
    $cita = $this->show($id);
    return view('citas.showCita',['cita' => $cita, 'cliente' => Cliente::find($cita->idUsuario) ]);
  }

  public function saveCita(Request $request)
  {
    $cliente = [];
    $cita = [
              "id" => $request['id'],
              "idCliente" => $request['id'],
              "idTipo" => $request['tiposCita'],
              "idClinica" => $request['idClinica'],
              "fecha" => $request['fecha'],
              "notas" => $request['notas']
            ];

    if ($request['id'] != "") {
        $nota = $this->update($request,$request['id']);
    }
    else {
        $nota = $this->store($request);
    }
    return redirect('/showCita/'.$nota->id);
  }

  public function citas($date)
  {
    $citas = $this->showByDate($date);
    return view('citas.listNotas',['citas' => $citas, 'fecha' => $date]);
  }

  public function deleteNota($id)
  {
    $article = Cita::find($id);
    $article->delete();
    return redirect('/citas/'.date("Y-m-d"));
  }

}
