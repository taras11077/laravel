@extends('admin.template')

@section('content')
	<h1>Products</h1>

	<a href="{{route('products.create')}}" class="btn btn-primary my-3">Add new product</a>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Category</th>
				<th>Description</th>
				<th>Actions</th>
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
					<td>
						<a href="{{route('products.edit', ['product' => $item->id])}}" class="btn btn-warning">Edit</a>
						<form action="{{route('products.destroy', ['product'=>$item->id])}}" method="post">
							@method('delete')
							@csrf
							<button class="btn btn-danger">Remove</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>


	{{$products->links()}}

@endsection