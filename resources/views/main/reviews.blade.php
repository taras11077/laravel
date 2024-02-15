@extends('layouts.app')

@section('content')

	<h1 class="text-center">{{$title}}</h1>

	<ol>
		@forelse ($reviews as $review)
			<li>
				<h4 class="mt-5">{{$review->title}}</h4>
				<h6 class="mt-3">{{$review->content}}</h6>
			</li>	
		@empty
			<p>No reviews</p>
		@endforelse
	</ol>

@endsection

@section('title', 'Reviews')