<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 8;
        }
        th, td {
            border: 3px solid black;
            text-align: center;
            padding: 5px;
            border: 2px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        .header-table, .header-table td {
            border: none;
        }
    </style>
    @php
        use Carbon\Carbon;

        $currentMonth = Carbon::now()->format('F Y'); // Nombre del mes y año actual
        $daysInMonth = Carbon::now()->daysInMonth; // Número de días en el mes actual
        $year = Carbon::now()->year; // Año actual
        $month = Carbon::now()->month; // Mes actual

        $total_dias_laborados = 0;
        $total_horas_laboradas = 0;
        $total_horas_por_dia = 8;

        $fecha = Carbon::now()->toDateString();
    @endphp
    </head>
    <body>
        <table class="header-table">
            <tr>
                <td colspan="3" rowspan="4" style="border: 1px solid black"><img src="logo.png" width="75px" height="75px" alt="" style="display:flex"></td>
                <td colspan="5" rowspan="2" style="border: 1px solid black">INGICAT SAS</td>
                <td style="border: 1px solid black;text-align: right;" colspan="2">DOCUMENTO No.</td>
            </tr>
            <tr>
                <td colspan="2"style="border: 1px solid black"> 01</td>
            </tr>
            <tr>
                <td colspan="5" rowspan="2"style="border: 1px solid black">REPORTE DE TIEMPO</td>
                <td style="border: 1px solid black; text-align: right;" colspan="2">Versión</td>
            </tr>
            <tr>
                <td colspan="2"style="border: 1px solid black"> 01</td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"style="border: 1px solid black; text-align: left">CLIENTE:</td>
                <td colspan="8"style="border: 1px solid black; text-align: left">Ecopetrol</td>
            </tr>
            <tr>
                <td colspan="2"style="border: 1px solid black; text-align: left">MES:</td>
                <td colspan="8"style="border: 1px solid black; text-align: left" >{{ $month }}</td>
            </tr>
            <tr>
                <td colspan="2"style="border: 1px solid black; text-align: left">ODS:</td>
                <td colspan="8"style="border: 1px solid black; text-align: left"></td>
            </tr>
            <tr>
                <td colspan="2"style="border: 1px solid black; text-align: left">AÑO:</td>
                <td colspan="8"style="border: 1px solid black; text-align: left">{{ $year }}</td>
            </tr>
        </table>

        <table>
            <thead>
                <tr style="border:black; color:#f2f2f2">
                    <th rowspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2">Dia</th>
                    <th rowspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2">Municipio</th>
                    <th colspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2">Hora en la mañana</th>
                    <th colspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2">Hora en la tarde</th>
                    <th rowspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2">Total Horas / dia</th>
                    <th rowspan="2" style="background-color: #a00404; text-align:center;border: 1px solid black; color:#f2f2f2" colspan="3">Actividades</th>
                </tr>
                <tr>
                    <th style="background-color: #a00404;border: 1px solid black;; color:#f2f2f2">Ingreso</th>
                    <th style="background-color: #a00404 ;border: 1px solid black;; color:#f2f2f2">Salida</th>
                    <th style="background-color: #a00404 ;border: 1px solid black;; color:#f2f2f2">Ingreso</th>
                    <th style="background-color: #a00404 ;border: 1px solid black;; color:#f2f2f2">Salida</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $daysInMonth; $i++)
                @php
                $date = \Carbon\Carbon::createFromDate($year, $month, $i);
                $isWeekend = $date->isWeekend();
                $morningStart = $isWeekend ? '0' : '07:30';
                $morningEnd = $isWeekend ? '0' : '12:00';
                $afternoonStart = $isWeekend ? '0' : '02:00';
                $afternoonEnd = $isWeekend ? '0' : '06:00';
                $totalHours = $isWeekend ? 0 : $total_horas_por_dia;

                if (!$isWeekend) {
                $total_dias_laborados++;
                $total_horas_laboradas += $total_horas_por_dia;
            }

            @endphp
                <tr>
                    <td style="border: 1px solid black ; text-align: center">{{ $i }}</td>
                    <td style="border: 1px solid black; text-align: center"></td>
                    <td style="border: 1px solid black; text-align: center">{{ $morningStart }}</td>
                    <td style="border: 1px solid black; text-align: center">{{ $morningEnd }}</td>
                    <td style="border: 1px solid black; text-align: center; text-align: center">{{ $afternoonStart }}</td>
                    <td style="border: 1px solid black; text-align: center">{{ $afternoonEnd }}</td>
                    <td style="border: 1px solid black; text-align: center">{{ $totalHours}}</td>
                    <td colspan="3" style="border: 1px solid black"></td>
                </tr>
            @endfor
            </tbody>
        </table>

        <table>
            <tr>
                <th colspan="2" style="border: 1px solid black">TOTAL DÍAS LABORADOS:</th>
                <td style="border: 1px solid black">{{ $total_dias_laborados }}</td>
                <td></td>
                <th colspan="2" style="border: 1px solid black; text-align: left">TOTAL HORAS LABORADAS:</th>
                <td style="border: 1px solid black; text-align: left">{{ $total_horas_laboradas }}</td>
                <th colspan="2" style="border: 1px solid black; text-align: left">FECHA:</th>
                <td style="border: 1px solid black; text-align: left">{{ $fecha }}</td>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="10" rowspan="4" style="border: 1px solid black">Observaciones:</th>
            </tr>
            <tr>   </tr>
        </table>
        <br>
        <table>
            <tr></tr>
            <tr>
                <td colspan="10" style="; text-align: left">
                    <p>La jornada máxima legal corresponde de lunes a sabado, ocho (8) horas laborales diarias. El trabajo extra debe ser autorizado previamente por el profesional de programación y control del proyecto quien a su vez solicitaráautorización al cliente, de lo contrario no será reconocido el tiempo extra.</p>
                </td>
            </tr>
            <tr>
                <th colspan="4" style="border: 1px solid black, text-align: left">FUNCIONARIO</th>
                <th colspan="3" style="border: 1px solid black, text-align: left">APROBADO POR</th>
                <th colspan="3"style="border: 1px solid black, text-align: left">TALENTO HUMANO</th>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black, text-align: left">NOMBRE</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">NOMBRE</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">NOMBRE</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>

            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black, text-align: left">C.C.</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">C.C.</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">C.C.</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black, text-align: left">CARGO</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">CARGO</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">CARGO</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black, text-align: left">FIRMA</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">FIRMA</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
                <td style="border: 1px solid black, text-align: left">FIRMA</td>
                <td colspan="2" style="border: 1px solid black, text-align: left"></td>
            </tr>
        </table>
</body>
</html>
