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
				@if($item_cart != null)
				<table class="table table-striped">
				  	<thead>
					    <tr>
					    	<th scope="col">Image</th>
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
					  			<td><img src="{{ $item->img_path }}" height="100px" width="100px"></td>
						      	<td>{{ $item->name }}</td>

						      	<td>
						      		<form action="/menu/mycart/{{$item->id}}/changeqty" method="POST">
						      			{{ csrf_field() }}
						      			{{ method_field('PATCH') }}
						      			<input type="number" name="newqty" value="{{ $item->quantity }}">
						      			<button class="btn btn-outline-primary">Update Quantity</button>
						      		</form>
						      	</td>
						      	
						      	<td>{{ $item->price }}</td>
						      	<td>{{ $item->subtotal }}</td>
						      	<td>
						      		<form action="/menu/mycart/{{ $item->id }}/delete" method="POST">
						      			{{ csrf_field() }}
						      			{{ method_field('DELETE') }}
						      		<button type="submit" class="btn btn-danger">Remove from cart</button>
						      		</form>
						      	</td>
					      	</tr>
					      	@endforeach

					    

				  	</tbody>
				</table>

		
					


					<a href="/menu/clearCart" class="btn btn-outline-dark">Clear Cart</a>

				

				<p class="lead">Total:{{ $total }} </p>

				<a href="/catalog" type="button" class="btn btn-outline-dark">Go back to shopping</a>



				@else
				<h2>Your Cart is Empty</h2>
				<a href="/catalog" class="btn btn-primary">Go back to shopping..</a>
				@endif
			</div>
		</div>
	</div>


</body>
</html>