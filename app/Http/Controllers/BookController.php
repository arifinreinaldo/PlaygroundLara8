<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    public function index()
    {
        return view('book');
    }

    public function ajax(Request $request)
    {
        $results = DB::table('books');
        if ($request->ajax()) {
            return Datatables::of($results)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'book_name' => 'required'
        ]);

        try {
            $mactivitylogs = Book::create($data);
        } catch (Exception $e) {

            return redirect("/book")->with('failed', 'Failed insert data.');
        }
        return redirect("/book")->with('success', 'Success insert data.');
    }
}
