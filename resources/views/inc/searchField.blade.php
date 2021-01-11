<form action="{{route('search')}}" method="GET" accept-charset="UTF-8">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Search for a title or author...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>