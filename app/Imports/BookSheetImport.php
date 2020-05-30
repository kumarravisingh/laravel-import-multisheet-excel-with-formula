<?php


namespace App\Imports;


use App\BookList;
use App\UserUpload;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Session;

class BookSheetImport implements  ToCollection,WithCalculatedFormulas,WithHeadingRow
{

    public function collection(Collection $bookDataRows)
    {
        $sales = Session::get('sales');
        foreach ($bookDataRows as $key=>$bookRow){
            if($bookRow->filter()->isNotEmpty()) {
                $book = new BookList();
                $book->title = $bookRow['title'];
                $book->author = $bookRow['author'];
                $book->price = $bookRow['price'];
                $book->copies_sold = $sales[$key]['copies_sold'];
                $book->total_revenue = $sales[$key]['total_revenue'];
                $book->save();
            }
        }
    }

}
