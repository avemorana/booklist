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
        $msg = Input::all(['msg'])['msg'];
        return view('book.index', compact('books', 'msg'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $errorMsg = [];
        $error = false;
        $author = Author::find($data['author']);
        if (!isset($data['author']) || !isset($author)) {
            $errorMsg[] = "Choose correct author";
            $error = true;
        }

        if (empty($data['title'])) {
            $errorMsg[] = "Enter correct title";
            $error = true;
        }

        if ($data['number_of_pages'] < 1) {
            $errorMsg[] = "Enter correct number of pages";
            $error = true;
        }

        if (empty($data['description'])) {
            $errorMsg[] = "Enter correct description";
            $error = true;
        }

        $uploadFile = $request->file('img');
        if (!isset($uploadFile)){
            $errorMsg[] = "Upload the image";
            $error = true;
        }
        if ($error){
            return back()->withErrors($errorMsg);
        }
        $ext = $uploadFile->getClientOriginalExtension();
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'bmp', 'tif'])) {
            $errorMsg[] = "Invalid type of image";
            $error = true;
        }

        if ($error){
            return back()->withErrors($errorMsg);
        }

        $book = Book::create([
            'author_id' => $data['author'],
            'title' => $data['title'],
            'number_of_pages' => ceil($data['number_of_pages']),
            'description' => $data['description'],
        ]);

        $fileName = $book->id . '.' . $ext;

        $uploadFile->storeAs('public/images/', $fileName);
        $book->img_path = 'storage/app/public/images/' . $fileName;
        $book->save();

        return redirect()->route('index', ['msg' => 'New book is successfully added']);
    }
}

