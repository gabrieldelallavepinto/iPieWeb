@extends('principal')
@section('content')

<div class='container-fluid'>
    <div class="row">
        <div class='col-md-12'>
            <div class="card mx-auto">
                <div class="card-header"><h2>Anuncios</h2></div>
                <div class="card-body">
                    <div class="row">
                        @foreach($anuncios as $anuncio)

                            <div class="col-md-4 mt-3">
                                <div class="anuncio card" id={{ $anuncio['id'] }} style="height: 100%;">
                                    @php
                                      $Aimagen = explode("/", $anuncio['imagen']);
                                    @endphp
                                    <img class="card-img-top" src="{{ asset("storage/".$Aimagen[1]) }}" alt="Card image cap">

                                    <div class="card-body">
                                        <h4 class="card-title">{{ $anuncio['titulo'] }}</h4>
                                        <h5 class="card-title">{{ Date('d-m-Y',strtotime($anuncio['fecha'])) }}</h5>
                                        <p class="card-text">{{ $anuncio['descripcion'] }}</p>
                                        @if ($anuncio['pdf'] != "")
                                          @php
                                            $Apdf = explode("/", $anuncio['pdf']);
                                          @endphp
                                          <a href="{{ asset("storage/".$Apdf[1]) }}">Descargar [PDF]</a>;
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('anuncios.botones')



<script>
    //editamos la cita al darle click
    $('.anuncio').on('click',function(){
        $idAnuncio = $(this).attr("id");

        $datos = '?idAnuncio='+$idAnuncio;

        window.location.href = "{{ route('anuncios.edit') }}"+$datos;
    });
</script>
@stop
