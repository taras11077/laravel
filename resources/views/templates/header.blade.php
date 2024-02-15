<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'My Laravel Project')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	@yield('css')
</head>
<body>
	<div class="text-center">
		<a href="{{route('home')}}">Home</a>
		<a href="{{route('contacts')}}">Contacts</a>
		<a href="{{route('reviews')}}">Reviews</a>
	</div>