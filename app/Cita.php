<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    public $rules = [
      'idTipo' => 'required',
      'idClinica' => 'required',
      'fecha' => 'required',
      'idPodologo' => 'required'
    ];


  protected $fillable = [
      'idCliente', 'idTipo', 'idClinica', 'fecha', 'idUsuario', 'idPodologo', 'notas'
     ];
}
