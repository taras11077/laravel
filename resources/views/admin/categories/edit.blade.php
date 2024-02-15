@extends('admin.template')

@section('content')
	<h1>Edit Category: {{$category->name}}</h1>

	@include('messages.errors')

	{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method'=>'put' ]) !!}
		   @include('admin.categories._form')
	{!! Form::close() !!}
@endsection

