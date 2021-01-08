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
                        <td>
                            <Button class="btn btn-secondary">Edit</Button>
                            <Button class="btn btn-danger"><i class="fas fa-trash"></i></Button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>