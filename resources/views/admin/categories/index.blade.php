@extends('admin.template')

@section('content')
	<h1>Categories</h1>

	<a href="{{route('categories.create')}}" class="btn btn-primary my-3">Add new category</a>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$item->name}}  ({{$item->products->count()}}) </td>
					<td>{{$item->description}}</td>
					<td>
						<a href="{{route('categories.edit', ['category' => $item->id])}}" class="btn btn-warning">Edit</a>
						<form action="{{route('categories.destroy', ['category'=>$item->id])}}" method="post">
							@method('delete')
							@csrf
							<button class="btn btn-danger">Remove</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection