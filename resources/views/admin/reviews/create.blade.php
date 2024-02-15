
@extends('templates.main')

@section('content')
	<h1>Create review</h1>

	@include('messages.errors')

	{!! Form::open(['route' => 'reviews.store']) !!}
		@include('admin.reviews._form')
	{!! Form::close() !!}


@endsection