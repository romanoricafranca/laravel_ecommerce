<!DOCTYPE html>
<html>
<head>
	<title>Sample views</title>
</head>
<body>

	<h1>This is a sample views file</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


	<p>Hello, <strong>{{ $fullname['name'] }}</strong></p>
	<p>Hello, <strong>{{ $fullname['middlename'] }}</strong></p>
	<p>Hello, <strong>{{ $fullname['surname'] }}</strong></p>

	<!-- if statements -->
	@if($fullname['name'] == 'juan')
	<h2>Hello {{ $fullname['name'] }}</h2>
	@else
	<h2>You're not juan</h2>
	@endif

	<!-- looping -->
	@foreach($fullname as $key => $value)
	<h2>Key is: {{$key}}, Value is {{$value}}</h2>
	@endforeach


</body>
</html>