@extends('templates.main')

@section('content')
	<h1>Reviews</h1>

	<a href="{{route('reviews.create')}}" class="btn btn-primary my-3">Add new review</a>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Content</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reviews as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$item->title}}</td>
					<td>{{$item->content}}</td>
					<td>
						<a href="{{route('reviews.edit', ['review' => $item->id])}}" class="btn btn-warning">Edit</a>
						<form action="{{route('reviews.destroy', ['review'=>$item->id])}}" method="post">
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