@extends('templates.main')

@section('content')
	<h1>Edit Review: {{$review->name}}</h1>

	@include('messages.errors')

	{!! Form::model($review, ['route' => ['reviews.update', $review->id], 'method'=>'put' ]) !!}
		   @include('admin.reviews._form')
	{!! Form::close() !!}
@endsection

