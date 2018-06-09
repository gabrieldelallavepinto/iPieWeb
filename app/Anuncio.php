<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = [
        'idUsuario', 'descripcion', 'fecha', 'imagen', 'pdf' ,'titulo' 
    ];
}
