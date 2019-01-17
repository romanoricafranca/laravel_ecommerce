<!DOCTYPE html>
<html>
<head>
	<title>item Details</title>


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
	 	<h3 class="display-5 mt-5">Item Details</h3>
	 	<hr class=" mb-5">
	 	<div class="row">


	 		
	 		<div class="col-lg-4">
	 			<img src="/{{ $itemdetails->img_path }}" class="img-fluid">
	 		</div>
	 		<div class="col-lg-4">
	 			
	 			<p>{{ $itemdetails->name }}</p>
	 			<p>{{ $itemdetails->description }}</p>
	 			<p>{{ $itemdetails->price }}</p>

	 			<a href="/menu/{{ $itemdetails->id }}/edit" class="btn btn-outline-dark">Edit</a>

	 			<a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</a>
	 		</div>

	 	</div>

	 </div>

	
<!-- delete modal -->
	<div id="deleteModal" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<form method="POST" action="/menu/{{$itemdetails->id}}/delete">
	 				{{ csrf_field() }}
	 				{{ method_field("DELETE") }}
	       			<p>Are you sure you want to delete this item {{ $itemdetails->name }}.</p>
	 				<button type="submit" class="btn btn-outline-danger">Confirm</button>
	 			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
	</div>




</body>
</html>