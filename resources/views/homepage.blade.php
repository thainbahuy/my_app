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
  <h2>Product Table</h2>
  <div>
    <form action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="import_file" />
        <button type="submit" class="btn btn-primary">Import File</button>
    </form>
  </div>
  <p><a href="{{ url('addnew') }}" class="btn btn-success">Add New</a></p>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Title</th>
        <th>Price</th>
        <th>control</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listProduct as $item)
      <tr>
        <td>{{$item->Id}}</td>
        <td>{{$item->Name}}</td>
        <td>{{$item->Title}}</td>
        <td>{{$item->Price}}</td>
        <td>
            <a href="{{url('delete/'.$item->Id)}}" class="btn btn-danger">Delete</a>
            {{--  <a href="{{url('update/'.$item->Id)}}"  class=" btn btn-primary">Update</a>  --}}
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
