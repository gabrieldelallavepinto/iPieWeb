
<?php

?>

<form action="{{ action('AnuncioController@saveAnuncio') }}" method="post">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-12"><h4>Anuncio</h4></div>

        <div class="d-none form-group col-md-6">
            <label for="id">Id</label>
            <input class="form-control" id="id" name="id" type="text" placeholder="id" value="{{ $anuncio->id }}">
        </div>
        <div class="d-none form-group col-md-6">
            <label for="idUsuario">idUsuario</label>
            <input class="form-control" id="idUsuario" name="idUsuario" type="text" placeholder="idUsuario" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group col-md-6">
            <label for="titulo">Titulo</label>
            <input class="form-control" id="titulo" name="titulo" type="text" placeholder="Titulo" value="{{ $anuncio->titulo }}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="fecha">Fecha</label>
            <input class="form-control" id="fecha" name="fecha" data-provide="datepicker" value="{{ $anuncio->fecha }}">
        </div>

        <div class="form-group col-md-12">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" rows="4" id="descripcion" name="descripcion" type="text" placeholder="Escribe la descripción del anuncio" required>{{ $anuncio->descripcion }}</textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="imagen">Imagen</label>
            <input class="form-control" id="imagen" name="imagen" type="file" placeholder="Seleciona Imagen" value="{{ $anuncio->imagen }}" >
        </div>

        <div class="form-group col-md-6">
            <label for="pdf">PDF adjunto</label>
            <input class="form-control" id="pdf" name="pdf" type="file" placeholder="Seleciona pdf" value="{{ $anuncio->pdf }}" >
        </div>


        <div class="col-md-12"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </div>

</form>

    <script>
        $('#fecha').datepicker({
            language: 'es',
            format: 'yyyy-mm-dd',
        });
    </script>
