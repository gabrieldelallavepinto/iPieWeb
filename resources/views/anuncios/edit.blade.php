@extends('principal')
@section('content')

<div class='container-fluid'>
    <div class="row">

        <div class="card mx-auto">
            <div class="card-header"><h2>Editar Anuncio</h2></div>
            <div class="card-body">
                @include('anuncios.form')
            </div>
        </div>


    </div>
</div>

@stop