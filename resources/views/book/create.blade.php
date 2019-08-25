<form method="POST" action="{{route('store')}}" enctype="multipart/form-data">

    <input type="text" placeholder="Title" name="title">
    <select name="author">
        @foreach($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
        @endforeach
    </select>
    <input type="number" placeholder="Number of pages" step="1" min="1" name="number_of_pages">
    <textarea rows="3" name="description"></textarea>
    <input type="file" name="img" id="img">
    <input type="submit" value="Create">
</form>
