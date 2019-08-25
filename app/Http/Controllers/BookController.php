<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return view('book.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $book = Book::create([
            'author_id' => $data['author'],
            'title' => $data['title'],
            'number_of_pages' => $data['number_of_pages'],
            'description' => $data['description'],
        ]);

        $uploadFile = $request->file('img');
        $fileName = $book->id . '.' . $uploadFile->getClientOriginalExtension();
        $uploadFile->storeAs('public/images/', $fileName);
        $book->img_path = 'storage/app/public/images/' . $fileName;
        $book->save();
    }
}

