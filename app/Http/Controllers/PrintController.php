<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    //

    public function showPrintForm()
    {
        return view('print');
    }

    public function generateExcel(Request $request)
    {
        $fileName = 'items-' . now()->format('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new ItemsExport, $fileName);
    }

}
