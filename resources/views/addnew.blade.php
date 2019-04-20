<!DOCTYPE html>
<html lang="en">
<head>
  <title>Repository learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <form method="GET" action="{{ url('addNewProduct') }}">
        @csrf
        <div class="form-group">
          <label for="exampleUsername">Name</label>
          <input type="text" name="name" class="form-control" id="exampleName" aria-describedby="emailHelp" placeholder="Enter Name product">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Title">
        </div>
        <div class="form-group">
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Price">
          </div>
        <button type="submit" class="btn btn-primary">Add New</button>
      </form>
</div>

</body>
</html>
