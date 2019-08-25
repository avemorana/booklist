<table>
    <th>id</th>
    <th>title</th>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
        </tr>
    @endforeach
</table>
{{$books->links()}}
