{!!Form::open(['action' => 'App\Http\Controllers\BookController@store', 'method'=>'post', 'accept-charset' => 'UTF-8']) !!}
  <div class="form-group">
      {{Form::label('title', 'Title:')}}
      {{Form::text('title',null, ['class' => 'form-control'])}} 
  </div>
  <div class="form-group">
      {{Form::label('author', 'Author:')}}
      {{Form::text('author',null, ['class' => 'form-control'])}} 
  </div>   
      {{Form::submit('Save',['class'=>'btn btn-primary'])}}
{!!Form::close() !!}