<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Actions</th>
            </tr>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td class="d-flex gap-1">
                            <Button class="btn btn-secondary">Edit</Button>
                            {!!Form::open(['action' => ['BookController@destroy', $book]])!!}
                                {{Form::hidden('_method','DELETE')}}
                                <Button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></Button>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>