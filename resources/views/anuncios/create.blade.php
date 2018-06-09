@extends('principal')
@section('content')

<div class="" style="margin-left: 20px;margin-right: 20px;">
    <div class="card mx-auto">
        <div class="card-header"><h2>Crear Anuncio</h2></div>
        <div class="card-body">
          @include('anuncios.form')
        </div>
    </div>
</div>

@stop
