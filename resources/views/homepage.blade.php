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

<div class="container">
  <h2>Account Table</h2>
  <p><a href="{{ url('addnew') }}" class="btn btn-success">Add New</a></p>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>control</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listAccount as $item)
      <tr>
        <td>{{$item->Id}}</td>
        <td>{{$item->Username}}</td>
        <td>{{$item->Password}}</td>
        <td>
            <a href="{{url('delete/'.$item->Id)}}" class="btn btn-danger">Delete</a>
            <a href="{{url('update/'.$item->Id)}}"  class=" btn btn-primary">Update</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
