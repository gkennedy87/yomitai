
    <table class="table" id="sortTable">
        <thead>
            <tr>
                <th scope="col">@sortablelink('id','id')</th>
                <th scope="col">@sortablelink('title','Title')</th>
                <th scope="col">@sortablelink('author','Author')</th>
                <th scope="col">Actions</th>
            </tr>
            <tbody>
              @if($books->isNotEmpty())
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td class="d-flex gap-1">
                            <Button class="btn btn-secondary" 
                                    data-toggle='modal'
                                    data-target='#editModal'>
                                    Edit
                            </Button>
                            {!!Form::open(['action' => ['App\Http\Controllers\BookController@destroy', $book]])!!}
                                {{Form::hidden('_method','DELETE')}}
                                <Button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></Button>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
              @else
                    <tr>
                      <td>
                        <p>No Results Found</p>
                      </td>
              @endif
            </tbody>
        </thead>
    </table>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Book Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h2>
                    Edit Book Details
                </h2>
              {!!Form::open(['action' => ['App\Http\Controllers\BookController@update', $book->id], 'method'=>'put']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title:')}}
                    {{Form::text('title',$book->title, ['class' => 'form-control'])}} 
                </div>
                <div class="form-group">
                    {{Form::label('author', 'Author:')}}
                    {{Form::text('author',$book->author, ['class' => 'form-control'])}} 
                </div>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{Form::submit('Save Changes',['class'=>'btn btn-primary'])}}
              {!!Form::close() !!}
            </div>
          </div>
        </div>
      </div>