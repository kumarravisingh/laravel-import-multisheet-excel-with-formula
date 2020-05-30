<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\BooksDataTable;

class UsersController extends Controller
{
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('welcome');
    }
}
