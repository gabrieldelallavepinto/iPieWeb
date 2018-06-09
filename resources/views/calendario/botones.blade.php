<a href="{{ route('cita.create') }}">   
    
    @if(Auth::user()->tipo == 1)
        <button type="button"class="btn btn-primary btn-circle crear" data-toggle="tooltip" data-placement="top" title="Crear Cita">
            <i class="fas fa-plus "></i>
        </button>
    @endif

</a>