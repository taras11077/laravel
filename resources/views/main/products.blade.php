@extends('layouts.app')

@section('content')

	<h5 class="text-center"> Products by category <h2 class="text-center">{{ $category->name }}</h2> </h5>

	<table class="table mt-5">
		<thead>
			<tr>
				<th>#</th>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Category</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td><img src="{{asset($item->image)}}" alt="{{$item->name}}" style="width: 100px"></td>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>{{$item->category->name}}</td>
					<td>{{$item->short_description}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{-- <ol>
		@forelse ($products as $product)
			<li><h5>{{ $product->name }}</h5></li>
		@empty
			<p>No product by this category</p>
		@endforelse
	</ol> --}}

@endsection

@section('title', 'Products')