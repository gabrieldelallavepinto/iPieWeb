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
    // $anuncios = Anuncio::all();
    $anuncios = array(
      '0' => array(
        'idUsuario' => 1, 
        'descripcion' => 'Affert brevi generibusque gaudemus saluti, auctori memoria flagitem odioque notionem sapientium meminerunt disserui conferebamus veriusque sponte praeterita primis maximam conetur stabilitas nulla cupiditates vituperata dicant declarant, debemus leniat dis', 
        'titulo' => 'Anuncio 1',
      ),
      '1' => array(
        'idUsuario' => 2, 
        'descripcion' => 'Impensa praeceptrice fames veniat quantus libro deteriora, parta sapienti corpus suapte reque tum maiorem mirari electis dubio voluptas futurove minimum.', 
        'titulo' => 'Anuncio 2',
      ),
      '2' => array(
        'idUsuario' => 2, 
        'descripcion' => 'Impensa praeceptrice fames veniat quantus libro deteriora, parta sapienti corpus suapte reque tum maiorem mirari electis dubio voluptas futurove minimum.', 
        'titulo' => 'Anuncio 3',
      ),
      '3' => array(
        'idUsuario' => 2, 
        'descripcion' => 'Impensa praeceptrice fames veniat quantus libro deteriora, parta sapienti corpus suapte reque tum maiorem mirari electis dubio voluptas futurove minimum.', 
        'titulo' => 'Anuncio 3',
      ),
    );
    return view('anuncios.index', ['anuncios' => $anuncios]);

    
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
