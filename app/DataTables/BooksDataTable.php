<?php

namespace App\DataTables;

use App\BookList;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BookList $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('books-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->parameters([
                        'lengthMenu' => [
                            [ 05, 10, 15, -1 ],
                            [ '05 rows', '10 rows', '15 rows', 'Show all' ]
                        ],
                        'order'   => [[0, 'desc']]
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('author'),
            Column::make('price'),
            Column::make('copies_sold'),
            Column::make('total_revenue'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
