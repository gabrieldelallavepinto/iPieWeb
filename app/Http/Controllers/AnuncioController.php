<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\User;
use Session;

class AnuncioController extends Controller
{
  public function index()
  {
    return Anuncio::all();
  }

  public function show($id)
  {
    return Anuncio::find($id);
  }

  public function store(Request $request)
  {
    $imagen = "";
    $pdf = "";
    if ($request->hasFile('imagen')) {
      $imagen =  $request->file('imagen')->store('public');
    }

    if ($request->hasFile('pdf')) {
      $pdf = $request->file('pdf')->store('public');
    }


    $anuncio = [
              "idUsuario" => $request['idUsuario'],
              "titulo" => $request['titulo'],
              "descripcion" => $request['descripcion'],
              "fecha" => $request['fecha'],
              "imagen" => $imagen,
              "pdf" => $pdf
            ];


    return Anuncio::create($anuncio);
  }

  public function update(Request $request, $id)
  {
    $user = Anuncio::find($id);
    $imagen = "";
    $pdf = "";
    if ($request->hasFile('imagen')) {
      $imagen =  $request->file('imagen')->store('public');
    }

    if ($request->hasFile('pdf')) {
      $pdf = $request->file('pdf')->store('public');
    }


    $anuncio = [
              "idUsuario" => $request['idUsuario'],
              "titulo" => $request['titulo'],
              "descripcion" => $request['descripcion'],
              "fecha" => $request['fecha'],
              "imagen" => $imagen,
              "pdf" => $pdf
            ];

    $user->update($anuncio);
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = Anuncio::find($id);
    $article->delete();
    return 204;
  }

  public function showByDate($id, $date){
    return Anuncio::whereDate('fecha', $date)->where('idClinica','=',$id)->get();
  }

  public function formAnuncio(){
    return view('notas.formNota', ['api_token' => Session::get('api_token'), 'fecha' => date("Y-m-d")]);
  }
  public function formAnuncioId($id)
  {
    return view('notas.formNota', ['api_token' => Session::get('api_token'), 'nota' => $this->show($id), 'fecha' => date("Y-m-d")]);
  }

  public function showAnuncio($id)
  {
    $nota = $this->show($id);
    return view('notas.showNota',['nota' => $nota, 'user' => User::find($nota->idUsuario) ]);
  }

  public function saveAnuncio(Request $request)
  {

    if ($request['id'] != "") {
        $nota = $this->update($request,$request['id']);
    }
    else {
        $nota = $this->store($request);
    }
    return redirect('/showNota/'.$nota->id);
  }

  public function anuncios($date)
  {
    $notas = $this->showByDate($date);
    return view('notas.listNotas',['notas' => $notas, 'fecha' => $date]);
  }

  public function deleteAnuncio($id)
  {
    $article = Anuncio::find($id);
    $article->delete();
    return redirect('/notas/'.date("Y-m-d"));
  }
}
