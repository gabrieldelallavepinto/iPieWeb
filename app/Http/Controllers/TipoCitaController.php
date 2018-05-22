<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCita;

class TipoCitaController extends Controller
{
  public function index()
  {
    return TipoCita::all();
  }

  public function show($id)
  {
    return TipoCita::find($id);
  }

  public function store(Request $request)
  {
    return TipoCita::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $user = TipoCita::find($id);
    $user->update($request->all());
    return $user;
  }

  public function delete(Request $request, $id)
  {
    $article = TipoCita::find($id);
    $article->delete();
    return 204;
  }

  public function formTipoCita(){
    return view('admin.formTipoCita');
  }
  public function formTipoCitaId($id)
  {
    return view('admin.formTipoCita', ['tipocita' => $this->show($id)]);
  }

  public function showTipoCita($id)
  {
    return view('admin.showTipoCita',['tipocita' => $this->show($id)]);
  }

  public function saveTipoCita(Request $request)
  {
    $request['color'] = $request['color'];
    if ($request['id'] != "") {
        $tipocita = $this->update($request,$request['id']);
    }
    else {
        $tipocita = $this->store($request);
    }
    return redirect('/admin/showTipoCita/'.$tipocita->id);
  }

  public function tipocitas()
  {
    $tipocitas = $this->index();
    return view('admin.listTipoCitas',['tipocitas' => $tipocitas]);
  }

  public function deleteTipoCita($id)
  {
    $article = TipoCita::find($id);
    $article->delete();
    return redirect('/admin/tipocitas');
  }

}
