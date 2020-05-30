<?php

namespace App\Http\Controllers;

use App\DataTables\BooksDataTable;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

class BookListController extends Controller
{

    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('welcome');
    }
    /**
     * This will get uploaded file and import its data into database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importBookData(Request $request){
        if($request->hasFile('books-data-file'))
        {
                $fileName = Storage::disk('public')->put('upload',$request->file('books-data-file'));
                $import = new UsersImport();
                //$import->onlySheets('Books','Sales');
                ($import)->import($fileName, 'public', Excel::XLSX);
            //dd(Storage::get('public/upload/CWTRXSIPwGbGzc2bDjHBhzbm1XKkbiPBRokR3LcO.xlsx'));
                //($import)->import('upload/wRvJTjXSClVrwGSjdD8wWPvIcBXfdsc5YffAsBiX.xlsx', 'public', Excel::XLSX);
                return redirect()->back();

        }else{
            return 'wrong file format';
        }
    }
}
