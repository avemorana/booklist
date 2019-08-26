@extends('book.layout')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Error!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" placeholder="Title" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <select name="author" id="author" class="form-control">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="number_of_pages">Number of pages</label>
            <input type="number" placeholder="Number of pages" step="1" min="1" name="number_of_pages"
                   id="number_of_pages" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="3" name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Create" class="form-control" class="btn btn-primary">
        </div>
    </form>
@endsection
