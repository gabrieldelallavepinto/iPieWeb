<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Cita;
use App\TipoCita;
use App\Cliente;
use App\Clinica;
use DateTime;

class CalendarioController extends Controller
{

    public function index(Request $request){
        

        //obtenemos la fecha
        $fecha = $request['fecha'];

        //si no tenemos la fecha se obtiene el día actual
        if(!$fecha)
            $fecha = date("Y-m-d");

        //fecha de inicio
        $fechaInicio = date('Y-m-d H:i:s', strtotime($fecha));
        //fecha + 1 dia
        $fechaFin = date('Y-m-d H:i:s', strtotime($fecha . ' +1 day'));

        //obtenemos todas las citas de la clinica y del dia ordenadas por fecha
        $citas = Cita::where('fecha','>=',$fechaInicio)->where('fecha','<',$fechaFin);

        //obtenemos la clinica
        $datos['clinica']='';
        if(isset($request['clinica']) && $request['clinica']!=''){
            $citas = $citas->where('idClinica', $request['clinica']);
            $datos['clinica'] = $request['clinica'];
        }
        $citas = $citas->orderby('fecha')->get();

        //obtenemos todas las clinicas
        $clinicas = Clinica::all();

        //guardamos el tipo de cita, el cliente asociado, la fecha y hora
        foreach($citas as $key => $cita){
            $citas[$key]['tipo'] = TipoCita::find($cita->idTipo);
            $citas[$key]['paciente'] = Cliente::find($cita->idCliente);
        }

        return view('calendario.index', ['citas' => $citas,'fecha' => $fecha, 'clinicas' => $clinicas, 'datos' => $datos,]);
    }

    public function citas(){
        $fecha = '11/11/2018';
        $citas = Cita::all();

        foreach($citas as $key => $cita){
            $citas[$key]['tipo'] = TipoCita::find($cita->idTipo);
            $citas[$key]['paciente'] = Cliente::find($cita->idCliente);
            $hora = explode(' ',$cita['fecha'])[1];
            $citas[$key]['hora'] = $hora;
        }


        return view('calendario.citas', ['citas' => $citas,'fecha' => $fecha,]);
    }
    
}