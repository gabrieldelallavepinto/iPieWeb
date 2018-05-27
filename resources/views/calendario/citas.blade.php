<div class="container-fluid">

    <div class="row">
        <div class="col-md-6 text-left">
            <h2>citas</h2>
        </div>
        <div class="col-md-6 text-right">
            <h3>{{ $fecha }}</h3>
        </div>
    </div>

    @foreach($citas as $cita)
        <div id="{{ $cita['id'] }}" class="row align-items-center cita">
            {{-- color tipo cita --}}
            <div class="col-md-1"><div class="color" style="background-color:{{ $cita['tipo']['color'] }};"></div></div>

            {{-- hora --}}
            <div class="col-md-1">{{ $cita['hora'] }}</div>

            <div class="col-md-10">
                {{-- nombre y apellidos del paciente --}}
                <div class="col-md-12">{{ $cita['paciente']['nombre'] }} {{ $cita['paciente']['apellidos'] }}</div>
                
                {{-- telefono fijo del paciente --}}
                <div class="col-md-12">{{ $cita['paciente']['tlfnFijo'] }}</div>

                {{-- telefono movil del paciente --}}
                <div class="col-md-12">{{ $cita['paciente']['tlfnMovil'] }}</div>
            </div>
        </div>
    @endforeach
        
    </div>

</div>