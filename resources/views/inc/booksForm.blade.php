<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="author">Password</label>
        <input type="text" class="form-control" id="author" name="author">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
</form>