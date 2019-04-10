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
    <form method="GET" action="{{ url('updateData') }}">
        @csrf
        @foreach ($dataUser as $item)
            <input type="hidden" value="{{ $item->Id }}" name="id" id="id">
            <div class="form-group">
            <label for="exampleUsername">Username</label>
            <input type="text" value="{{ $item->Username }}" name="username" class="form-control" id="exampleUsername" aria-describedby="emailHelp" placeholder="Enter Username">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" value="{{ $item->Password }}" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>

</body>
</html>
