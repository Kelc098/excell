<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::select('name', 'quantity', 'price')->get();
    }
    public function headings(): array
    {
        // Define los encabezados de las columnas
        return [
            'Name',
            'Quantity',
            'Price',
        ];
    }
}
