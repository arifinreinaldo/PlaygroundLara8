<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BookController extends Controller
{
    public function index()
    {
        return view('book');
    }

    public function ajax(Request $request)
    {
        $results = DB::table('books AS u');
        if ($request->ajax()) {
            return Datatables::of($results)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
