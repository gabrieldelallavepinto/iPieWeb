<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\User;
use Session;

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

  public function showByDate($id, $date){
    return Nota::whereDate('fecha', $date)->where('idClinica','=',$id)->get();
  }

  public function formNota(){
    return view('notas.formNota', ['api_token' => Session::get('api_token'), 'fecha' => date("Y-m-d")]);
  }
  public function formNotaId($id)
  {
    return view('notas.formNota', ['api_token' => Session::get('api_token'), 'nota' => $this->show($id), 'fecha' => date("Y-m-d")]);
  }

  public function showNota($id)
  {
    $nota = $this->show($id);
    return view('notas.showNota',['nota' => $nota, 'user' => User::find($nota->idUsuario) ]);
  }

  public function saveNota(Request $request)
  {

    if ($request['id'] != "") {
        $nota = $this->update($request,$request['id']);
    }
    else {
        $nota = $this->store($request);
    }
    return redirect('/showNota/'.$nota->id);
  }

  public function notas($date)
  {
    $notas = $this->showByDate($date);
    return view('notas.listNotas',['notas' => $notas, 'fecha' => $date]);
  }

  public function deleteNota($id)
  {
    $article = Nota::find($id);
    $article->delete();
    return redirect('/notas/'.date("Y-m-d"));
  }
}
