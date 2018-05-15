<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\TipoCita;

class CitaController extends Controller
{
  public function index()
  {
    return Cita::all();
  }

  public function create()
  {
    $tiposCita = TipoCita::select('id','nombre','color')->get();
    return view('citas.form', ['tiposCita' => $tiposCita]);
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

  public function showByDate($date){
    return Cita::whereDate('fecha', $date)->get();
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
    $cliente = []
    $cita = [
              "id" => $request['id'],
              "idCliente" => $request['id'],
              "idTipo" => $request['tiposCita'],
              "idClinica" => $request['idClinica'],
              "fecha" => $request['fecha'],
              "notas" => $request['notas']
            ]

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
