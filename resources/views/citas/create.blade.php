@extends('principal')
@section('content')

<div class="" style="margin-left: 20px;margin-right: 20px;">
    <div class="card mx-auto">
        <div class="card-header"><h2>Crear cita</h2></div>
        <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
            <strong id="msj"></strong>
        </div>
        <div class="card-body">
            @include('citas.form')
        </div>
    </div>
</div>
<script type="text/javascript" src="js/validation.js"></script>


@stop
