@extends('admin.template')

@section('content')
	<h1>Create Product</h1>

	@include('messages.errors')

	{!! Form::open(['route' => 'products.store', 'files' => true]) !!}
		@include('admin.products._form')
	{!! Form::close() !!}
@endsection