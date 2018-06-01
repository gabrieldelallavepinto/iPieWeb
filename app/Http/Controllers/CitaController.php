<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\TipoCita;
use App\Cliente;
use App\User;
use App\Clinica;

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
    $podologos = User::select('id','name')->get();
    $clinicas = Clinica::select('id', 'ciudad','provincia','direccion')->get();
    return view('citas.create', ['tiposCita' => $tiposCita, 'podologos' => $podologos, 'clinicas' => $clinicas]);
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

  public function showByDateClinica($clinica, $date){
    return Cita::whereDate('fecha', $date)->where('idClinica','=',$clinica)->get();
  }

  public function showByDatePodologo($podologo, $date){
    return Cita::whereDate('fecha', $date)->where('idPodologo','=',$podologo)->get();
  }

  public function showByDatePodologoClinica($podologo, $clinica, $date){
    return Cita::whereDate('fecha', $date)->where('idClinica','=',$clinica)->where('idPodologo','=', $podologo)->get();
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
