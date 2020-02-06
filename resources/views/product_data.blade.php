
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('assets/css/file_upload.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
  <div class="container center">
    <div class="row">     
      <div class="col-md-12">
        <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
        <a href="{{url('/')}}" type="submit" style="margin-left:850px" class="btn btn-primary">Goto CSV Upload</a>
      </div>
    </div>
    <table class="table table-striped table-dark">
      <thead style="background-color:rgb(255, 63, 63)">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Month</th>
          <th scope="col">Year</th>
          <th scope="col">Product Price per Month</th>        
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        @if(count($products) > 0) 
          @foreach($products as $product)
          <tr>
            <th>{{$i}}</th>
            <td>{{$product->category_name}}</td>
            <td>{{$product->month}}</td>
            <td>{{$product->year}}</td>
            <td>{{$product->price}}</td>
          </tr>
          <?php $i++; ?>
          @endforeach
        @else 
          <td>{{"No Records Found"}}</td>
        @endif
      </tbody>
    </table>
    {{ $products->links() }}
  </div>
</body>
</html>