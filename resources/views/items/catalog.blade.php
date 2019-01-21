<!DOCTYPE html>
<html>
<head>
	<title>Catalog</title>

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



	 {{-- {{ dd(Session::get('cart')) }} --}}

	<div class="container">
		
		<div class="row">
			
			<div class="col-lg-12">

				@if(Session::has('successmessage'))
				<div class="alert alert-success">
					{{ Session::get('successmessage') }}
				</div>
				@elseif(Session::has('deletemessage'))
				<div class="alert alert-danger">
					{{ Session::get('deletemessage') }}
				</div>
				@endif
				<h1>Catalog</h1>

				<h3>Categories</h3>

				@foreach($categories as $category)

					<a href="">{{ $category->name }}</a>
											
				@endforeach

				<hr>
				<h3>Current Items</h3>

			</div>


			@foreach($items as $item)
			

			<div class="col-lg-3">
				<div class="card text-white bg-dark mb-3">
					<a href="/menu/{{ $item->id }}"><img class="card-img-top" src="/{{ $item->img_path }}" alt="Card image cap"></a>
					<div class="card-body">
						<h5 class="card-title"><a href="/menu/{{ $item->id }}">{{ $item->name }}</a></h5>
						<p class="card-text">{{ $item->description }}</p>
						<a href="/menu/{{ $item->id }}" class="btn btn-primary">Go somewhere</a>


						<form method="POST" action="/addToCart/{{ $item->id }}">
							{{ csrf_field() }}

							<label>Quantity : </label>
							<input type="number" name="quantity" value="1" class="form-control" id="quantity" >
							<button class="btn btn-outline-success">Add to cart</button>
						</form>

					</div>
				</div>
			</div>	
											
			@endforeach


		</div>

			<a href="/menu/add" class="btn btn-outline-dark">Add new item</a>
			<a href="/showcart" class="btn btn-outline-dark">Show Cart</a>
	</div>


	
	


</body>
</html>