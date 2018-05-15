<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCita extends Model
{
  protected $fillable = [
      'nombre', 'descripcion','color'
     ];
}
