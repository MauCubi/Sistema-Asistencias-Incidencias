<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\HoraExtra;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\IncidenciaHoraria;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function seleccionarEmpleado(){
        $empleados = Empleado::get();
        return view("reporte/create",["empleados" => $empleados]);
    }



    public function generatePDF(Request $request)
    {
        $request->validate([
                'start' => 'required',            
                'end' => 'after_or_equal:start',
            ]);
        
        $empleado = Empleado::where('id', $request->empleado_id)->first();
        $start = $request->start;
        $end = $request->end;
        $start2 = date('d/m/Y', strtotime($request->start));
        $end2 = date('d/m/Y', strtotime($request->end));
        date('d/m/Y', strtotime($start));
        //Datos asistencias
        $asistencias = Asistencia::where('empleado_id', $empleado->id)->whereBetween('start', [$start, $end])->get();
        $cantidadAsistencias = Asistencia::where('empleado_id', $empleado->id)->whereBetween('start', [$start, $end])->count();
        $horasAsistencias = 0;
        $minutosAsistencias = 0;
        foreach ($asistencias as $asistencia) {
            $horasAsistencias = $horasAsistencias + $asistencia->hora;
            $minutosAsistencias += $asistencia->minuto;
        }
        $horasAsistencias += intdiv($minutosAsistencias, 60);
        $minutosAsistencias = $minutosAsistencias%60;

        //Datos Horas Extras
        $horasExtras = HoraExtra::where('empleado_id', $empleado->id)->whereBetween('start', [$start, $end])->get();
        $cantidadHorasExtras = HoraExtra::where('empleado_id', $empleado->id)->whereBetween('start', [$start, $end])->count();
        $horasHorasExtras = 0;
        $minutosHorasExtras = 0;
        foreach ($horasExtras as $horasExtra) {
            $horasHorasExtras = $horasHorasExtras + $horasExtra->hora;
            $minutosHorasExtras += $horasExtra->minuto;
        }
        $horasHorasExtras += intdiv($minutosHorasExtras, 60);
        $minutosHorasExtras = $minutosHorasExtras % 60;

        //Calculo horas trabajadas        
        $minutosTotales = ($minutosAsistencias + $minutosHorasExtras);    
        $horasTotales = ($horasAsistencias + $horasHorasExtras) + intdiv($minutosTotales, 60);
        $minutosTotales = $minutosTotales % 60;    
        
        //Datos Inasistencias
        $inasistencias = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Inasistencia')
                ->whereBetween('fecha', [$start, $end])->count();
        $cantidadJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Inasistencia')
                ->where('justificacion', true)->whereBetween('fecha', [$start, $end])->count();
        $cantidadNoJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Inasistencia')
                ->where('justificacion', false)->whereBetween('fecha', [$start, $end])->count();  
                
        //Datos Tardanzas
        $tardanzas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Tardanza')
                ->whereBetween('fecha', [$start, $end])->count();
        $cantidadTardanzasJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Tardanza')
                ->where('justificacion', true)->whereBetween('fecha', [$start, $end])->count();
        $cantidadTardanzasNoJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Tardanza')
                ->where('justificacion', false)->whereBetween('fecha', [$start, $end])->count();  
                
        //Retiros Tempranos
        $tempranos = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Retiro Temprano')
                ->whereBetween('fecha', [$start, $end])->count();
        $cantidadTempranosJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Retiro Temprano')
                ->where('justificacion', true)->whereBetween('fecha', [$start, $end])->count();
        $cantidadTempranosNoJustificadas = IncidenciaHoraria::where('empleado_id', $empleado->id)->where('tipo', 'Retiro Temprano')
                ->where('justificacion', false)->whereBetween('fecha', [$start, $end])->count();  

        //Horarios
        $horarios = $empleado->horario->jornadas;

        $data = [
            'title' => 'Reporte del Empleado'.' '. $empleado->nombre.' '. $empleado->apellido,
            'date' => date('m/d/Y'),
            'datestart' => $start2,
            'dateend' => $end2,
            'asistencias' => $asistencias,
            'cantidadAsistencias' => $cantidadAsistencias,
            'horasAsistencia' => $horasAsistencias,
            'minutosAsistencia' => $minutosAsistencias,
            'horasExtras' => $horasExtras,
            'cantidadHorasExtras' => $cantidadHorasExtras,
            'horasHorasExtras' => $horasHorasExtras,
            'minutosHorasExtras' => $minutosHorasExtras,
            'horasTotales' => $horasTotales,
            'minutosTotales' => $minutosTotales,
            'inasistenciaTotal' => $inasistencias,
            'inasistenciaJustificada' => $cantidadJustificadas,
            'inasistenciaNoJustificada' => $cantidadNoJustificadas,
            'tardanzaTotal' => $tardanzas,
            'tardanzaJustificada' => $cantidadTardanzasJustificadas,
            'tardanzaNoJustificada' => $cantidadTardanzasNoJustificadas,
            'tempranoTotal' => $tempranos,
            'tempranoJustificada' => $cantidadTempranosJustificadas,
            'tempranoNoJustificada' => $cantidadTempranosNoJustificadas,
            'horarios' => $horarios,

        ];
          
        $pdf = PDF::loadView('reporte.myPDF', $data);
    
        //$pdf->stream("reporte.pdf", array("Attachment" => false));

        //exit(0);
        //return $pdf->download('itsolutionstuff.pdf');
        return $pdf->stream("reporte.pdf", array("Attachment" => $data));
    }
    
}
