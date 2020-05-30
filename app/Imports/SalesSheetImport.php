<?php


namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Session;

class SalesSheetImport implements  ToCollection,WithCalculatedFormulas,WithHeadingRow
{
    public function collection(Collection $salesDataRows)
    {
        Session::put('sales', $salesDataRows);
    }


}
