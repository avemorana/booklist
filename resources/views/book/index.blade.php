@extends('book.layout')
@section('content')
    @if(isset($msg))
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> {{$msg}}
        </div>
    @endif
    <a href="{{route('create')}}">Create new book</a>
    <table class="table">
        <th>id</th>
        <th>title</th>
        <th>author</th>
        <th>number of pages</th>
        <th>description</th>
        <th>image</th>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->number_of_pages}}</td>
                <td>{{$book->description}}</td>
                <td>
                    <img src="{{\Illuminate\Support\Facades\Storage::url($book->img_path)}}" width="100px">
                </td>
            </tr>
        @endforeach
    </table>
    {{$books->links()}}
@endsection
