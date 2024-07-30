<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TimesExport implements FromView
{



    public function view(): View
    {
        return view('timesheet');
    }

}
