<!DOCTYPE html>
<html>
<head>
	<title>Show Cart</title>

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
			<div class="col-lg-12">
				<h1>My Cart</h1>
			</div>
			<div class="col-lg-12">
				<table class="table table-dark">
				  	<thead>
					    <tr>
					      	<th scope="col">Item</th>
					      	<th scope="col">Quantity</th>
					     	<th scope="col">Price</th>
					      	<th scope="col">Subtotal</th>
					      	<th scope="col">Action</th>
					    </tr>
				  	</thead>
				  	<tbody>
					    
					  		@foreach ($item_cart as $item)
					  		<tr>
					      	<td>{{ $item->name }}</td>
					      	<td>{{ $item->quantity }}</td>
					      	<td>{{ $item->price }}</td>
					      	<td>{{ $item->subtotal }}</td>
					      	<td></td>
					      	</tr>
					      	@endforeach

					    

				  	</tbody>
				</table>
				
				<p class="lead">Total:{{ $total }} </p>

				<a href="" type="button" class="btn btn-outline-dark">Go back to shopping</a>
			</div>
		</div>
	</div>


</body>
</html>