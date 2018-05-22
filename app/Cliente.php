<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


  public $rules = [
    'nombre' => 'required',
    'apellidos' => 'required',
    'tlfnFijo' => 'min:9|max:9',
    'tlfnMovil' => 'min:9|max:9'
  ];

  protected $fillable = [
      'nombre', 'apellidos', 'tlfnFijo','tlfnMovil'
  ];
}
