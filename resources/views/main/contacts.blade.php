@extends('layouts.app')

@section('content')
	<h1>Contact Us</h1>

	{{-- @include('messages.errors') --}}

	@if(session('success'))
		<div class="alert alert-success">{{session('success')}}</div>
	@endif

	<form action="{{route('contacts.send')}}" method="post">
		@csrf
		<div class="mt-3">
			<label>Name:</label>
			<input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
			@error('name')
				<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>

		<div class="mt-3">
			<label>Email:</label>
			<input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
			@error('email')
				<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>

		<div class="mt-3">
			<label>Message:</label>
			<textarea name="message" class="form-control @error('message') is-invalid @enderror">{{old('message')}}</textarea>
			@error('message')
				<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>

		<button class="btn btn-primary mt-5">Send</button>
	</form>
   
@endsection
