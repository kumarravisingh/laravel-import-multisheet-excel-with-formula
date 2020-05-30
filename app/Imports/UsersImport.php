<?php

namespace App\Imports;

use App\BookList;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersImport implements WithMultipleSheets {
    use Importable;

    /**
     * mark sheets to be imported, point to remember is order of sheets is important
     * if sales sheet has formula of book sheet first import sales sheet
     * @return array
     */
    public function sheets(): array
    {
            return [
                'Sales' => new SalesSheetImport(),
                'Books' => new BookSheetImport(),
            ];
    }

}
