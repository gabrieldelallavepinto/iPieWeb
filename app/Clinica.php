<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
  protected $fillable = [
      'ciudad', 'provincia', 'direccion'
  ];
}
