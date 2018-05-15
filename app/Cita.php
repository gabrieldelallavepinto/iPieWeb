<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
  protected $fillable = [
      'idCliente', 'idTipo', 'idClinica', 'fecha', 'notas'
     ];
}
