<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Support\Facades\Hash;


class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
        ];
    }

    public function model(array $row)
    {
/*          dd($row);
 */        return new Product([
            'name' => $row['name'],
            'document' => $row['document'],
            /* 'password' => $row['document'] */
            'password' => Hash::make($row['document'])
        ]);
    }
}
