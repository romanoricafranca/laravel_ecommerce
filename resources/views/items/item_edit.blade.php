<!DOCTYPE html>
<html>
<head>
	<title>Edit Item</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- jquery -->
		<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
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
				<h1 class="mt-5">Item Edit</h1>

				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif


				<hr class="mt-2 mb-5">

				<form method="POST" action="/menu/{{ $itemedit->id }}/edit" enctype="multipart/form-data">

					{{ csrf_field() }}
					{{ method_field("PUT") }}


					<div class="form-group">
						<label>Item Name:</label>
						<input class="form-control" type="text" name="name" value="{{ $itemedit->name }}">
					</div>

					<div class="form-group">
						<label>Item Description:</label>
						<input class="form-control" type="text" name="description" value="{{ $itemedit->description }}">
					</div>

					<div class="form-group">
						<label>Item Price:</label>
						<input class="form-control" type="number" name="price" value="{{ $itemedit->price }}">
					</div>

					<div class="form-group">
						<label>Item Categories:</label>
						<select name="categories">

							@foreach($categories as $category)

								@if($itemedit->category_id == $category->id )
									<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
								@else
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endif

							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Item Image:</label>
						<input class="form-control-file" type="file" name="image" value="">
					</div>

					<button class="btn btn-outline-dark" type="submit">Save</button>															
				</form>

			</div>
		</div>
	</div>


</body>
</html>