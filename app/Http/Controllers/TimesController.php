<?php
namespace App\Http\Controllers;

use App\Exports\TimesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimesController extends Controller
{
    public function index(){
        return view('timesheet')
    ;}

    public function export()
    {
        return Excel::download(new TimesExport, 'timesheet.xlsx');
    }

}


/*
class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();

        // Agrupa las actividades por fecha
        $agrupados = $reportes->groupBy(function($item) {
            return Carbon::parse($item->fecha)->format('Y-m-d'); // Agrupa por fecha
        });

        // Convertir a un formato que se puede usar en la vista
        $datos = $agrupados->map(function($items) {
            return [
                'fecha' => $items->first()->fecha,
                'ubicaciones' => $items->pluck('ubicacion')->unique()->implode(', '),
                'actividades' => $items->pluck('actividad')->implode(', '),
            ];
        })->values(); // Asegúrate de que los datos se conviertan en un array indexado

        // Genera una lista de todos los días del mes actual
        $mes = Carbon::now()->month;
        $anio = Carbon::now()->year;
        $diasDelMes = [];
        for ($dia = 1; $dia <= Carbon::createFromFormat('m', $mes, $anio)->daysInMonth; $dia++) {
            $fecha = Carbon::create($anio, $mes, $dia)->format('Y-m-d');
            $diasDelMes[$fecha] = [
                'fecha' => $fecha,
                'ubicaciones' => '',
                'actividades' => '',
            ];
        }

        // Combina los datos existentes con los días del mes
        foreach ($datos as $dato) {
            $diasDelMes[$dato['fecha']] = $dato;
        }

        return view('reportes.index', ['diasDelMes' => $diasDelMes]);
    }
}
 */
