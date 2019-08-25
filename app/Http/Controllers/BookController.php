<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return view('book.index', compact('books'));
    }

    public function create()
    {
        dd(__METHOD__);
//        return view('book.create');

    }

    public function store()
    {
        dd(__METHOD__);
    }
}

