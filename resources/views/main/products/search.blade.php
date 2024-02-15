@extends('layouts.app')

@section('content')

	<h5 class="text-center"> Found products for <h2 class="text-center">"{{ $query }}"</h2> </h5>

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
@endsection

@section('title', 'Products')