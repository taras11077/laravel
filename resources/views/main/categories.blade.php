@extends('layouts.app')

@section('content')

	<h1 class="text-center">{{$title}}</h1>

	<ol>
		@forelse ($categories as $category)
			<li>
				<a class="nav-link" href="{{ route('category.show', $category) }}">
					<h4 class="mt-3">{{$category->name}}</h4>
				</a>
			</li>	
		@empty
			<p>No categories</p>
		@endforelse
	</ol>

@endsection

@section('title', 'Categories')