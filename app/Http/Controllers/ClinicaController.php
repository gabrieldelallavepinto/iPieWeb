<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;
use Session;

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
    $clinica = Clinica::find($id);
    $clinica->update($request->all());
    return $clinica;
  }

  public function delete(Request $request, $id)
  {
    $article = Clinica::find($id);
    $article->delete();
    return 204;
  }

  public function formClinica(){
    return view('admin.formClinica', ['api_token' => Session::get('api_token')]);
  }
  public function formClinicaId($id)
  {
    return view('admin.formClinica', ['api_token' => Session::get('api_token'), 'clinica' => $this->show($id)]);
  }

  public function showClinica($id)
  {
    return view('admin.showClinica',['clinica' => $this->show($id)]);
  }

  public function saveClinica(Request $request)
  {

    if ($request['id'] != "") {
        $clinica = $this->update($request,$request['id']);
    }
    else {
        $clinica = $this->store($request);
    }
    return redirect('/admin/clinicas');
  }

  public function clinicas()
  {
    $clinicas = $this->index();
    return view('admin.listClinicas',['clinicas' => $clinicas]);
  }

  public function deleteClinica($id)
  {
    $article = Clinica::find($id);
    $article->delete();
    return redirect('/admin/clinicas');
  }
}
