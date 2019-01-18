<!DOCTYPE html>
<html>
<head>
	<title>Add Items Form</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<!-- bootstrap js -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">

				<h1 class="display-4 mt-5">Add New Item</h1>

				<hr class="mb-4 mt-4">


				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

				<form action="/menu/add" method="POST" enctype="multipart/form-data">
						 {{ csrf_field() }}

					<div class="form-group">
					 	<label for="exampleInputEmail1">Name:</label>
					    <input type="text" class="form-control" id="name" name="name">
					</div>

					   	<div class="form-group">
					   		<label for="exampleInputEmail1">Description:</label>
					    	<input type="text" class="form-control" id="description" name="description">
						</div>

					  	<div class="form-group">
						   	<label for="exampleInputEmail1">Price:</label>
						    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0">
						</div>

						<div class="form-group">
							<label>Item Categories:</label>
							<select name="categories">

							@foreach($categories as $category)
							<option value="{{ $category->id }}" selected>{{ $category->name }}</option>@endforeach
							
							</select>
						</div>					    

						<div class="form-group">

					   	<label for="exampleInputEmail1">Upload Image:</label>
					    <input type="file" class="form-control-file" id="img_path" name="image">

					   	</div>

					  <button type="submit" class="btn btn-outline-success">Add New Item</button>
				</form>
			</div>	
		</div>

	</div>






</body>
</html>