@extends('admin.template')

@section('content')
	<h1>Create Category</h1>

	@include('messages.errors')

	{!! Form::open(['route' => 'categories.store']) !!}
		@include('admin.categories._form')
	{!! Form::close() !!}
@endsection



