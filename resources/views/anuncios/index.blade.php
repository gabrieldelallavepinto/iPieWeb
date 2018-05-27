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
                    
                            <div class="col-md-4">
                                <div class="card" style="height: 100%;">
                                    <img class="card-img-top" src="1.jpg" alt="Card image cap">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $anuncio['titulo'] }}</h4>
                                        <p class="card-text">{{ $anuncio['descripcion'] }}</p>
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
        

@stop