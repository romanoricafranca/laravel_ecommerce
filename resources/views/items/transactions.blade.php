<!DOCTYPE html>
<html lang="en">
<head>
	<title>Transactions</title>
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
			<div class="col-8 mx-auto">
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Order ID:</th>
							<th>Date:</th>
							<th>Item:</th>
							<th>Quantity:</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
							@foreach($order->items as $item_order)
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $item_order->pivot->created_at->diffForHumans() }}</td>
								<td>{{ $item_order->name }}</td>
								<td>{{ $item_order->pivot->quantity }}</td>		
							</tr>
							@endforeach
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>



	
</body>
</html>