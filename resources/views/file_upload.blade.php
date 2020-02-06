
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
  <style type="text/css">
  	.alert {
  		height:10px;
  	}
  	li {
  		font-size:15px;
  		margin-top:-10px;
  		
  	}
  </style>
</head>
<body>
	<div class="container center">
  		<div class="row">     
        	<div class="col-md-12">
	          <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
	          <a href="{{url('/view_products')}}" type="submit" style="margin-top:20px;margin-left:850px" class="btn btn-primary">View CSV data</a>
	        </div>
      	</div>
	  	<div class="row">
			<div class="col-md-12">
				<h1 class="white mt-5">CSV File Upload</h1>
			</div>
	  	</div>

	  	@if(count($errors) > 0)
	  		<div class="offset-3 alert alert-danger w-50">
	  			<ul>
	  				@foreach ($errors->all() as $error)
	  					<li>{{ $error }}</li>
	  				@endforeach
	  			</ul>
	  		</div>
	  	@endif
	
	  	<form name="upload" method="post" action="{{url('/upload_products')}}" enctype="multipart/form-data" accept-charset="utf-8">
	    	{{csrf_field()}}
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="btn-container">
					<!--the three icons: default, ok file (img), error file (not an img)-->
					<h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
					<h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
					<h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
					<!--this field changes dinamically displaying the filename we are trying to upload-->
					<p id="namefile">Only CSV file is allowed!</p>
					<!--our custom btn which which stays under the actual one-->
					<button type="button" id="btnup" class="btn btn-primary btn-lg">Browse for your CSV file!</button>
					<!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
					<input type="file" value="" name="fileup" id="fileup">
					</div>
				</div>
			</div>
			<!--additional fields-->
			<div class="row">			
				<div class="col-md-12">
					<!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
					<input type="submit" value="Submit!" class="btn btn-primary" id="submitbtn">
					<button type="button" class="btn btn-default" disabled="disabled" id="fakebtn">Submit! <i class="fa fa-minus-circle"></i></button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

<script src="{{url('assets/js/file_upload.js')}}"></script>

