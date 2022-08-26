<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<h2>Edit Page</h2>
<form method="POST" action="{{ route('posts.update') }}" class="form-horizontal mt-4">
    @csrf
    <input type="hidden" value="{{ $posts->id }}" name="posts_id">

<div class="mb-3" style="width: 50%">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input value="{{ $posts->title }}" type="text" class="form-control" id="exampleFormControlInput1" name="posts_title">
  </div>
  <div class="mb-3" style="width: 50%">
    <label for="exampleFormControlInput1" class="form-label">Description</label>
    <input value="{{ $posts->description }}" type="text" class="form-control" id="exampleFormControlInput1" name="posts_description">
  </div>
  <div class="button-group" style="margin-left: 625px; padding-top: 20px">
    <button type="submit" class="btn waves-effect waves-light btn-success">Edit Post</button>
</div>
</form>
</body>