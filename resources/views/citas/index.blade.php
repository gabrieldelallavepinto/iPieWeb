<div class="container-fluid">

    <div class="row">
        <div class="col-md-6 text-left">
            <h2>citas</h2>
        </div>
        <div class="col-md-6 text-right">
            <h3>{{ $fecha }}</h3>
        </div>
    </div>

    {{-- si no tiene citas --}}
    @if(!count($citas))
        <div class="row align-items-center noCita">
            {{-- no hay citas aún --}}
            <div class="col-md-12">No tiene citas para hoy</div>
        </div>
    @endif
    {{-- si tiene citas --}}
    @foreach($citas as $cita)
        <div id="{{ $cita['id'] }}" class="row align-items-center cita">
            {{-- color tipo cita --}}
            <div class="col-md-1"><div class="color" style="background-color:{{ $cita['tipo']['color'] }};" data-toggle="tooltip" data-placement="left" title="{{ $cita['tipo']['nombre'] }}"></div></div>

            {{-- hora --}}
            <div class="col-md-2">{{ explode(' ',$cita['fecha'])[1] }}</div>

            <div class="col-md-9">
                {{-- nombre y apellidos del paciente --}}
                <div class="col-md-12">{{ $cita['paciente']['nombre'] }} {{ $cita['paciente']['apellidos'] }}</div>
                
                {{-- telefono fijo del paciente --}}
                <div class="col-md-12">{{ $cita['paciente']['tlfnFijo'] }}</div>

                {{-- telefono movil del paciente --}}
                {{-- <div class="col-md-12">{{ $cita['paciente']['tlfnMovil'] }}</div> --}}
            </div>
        </div>
    @endforeach
        
</div>