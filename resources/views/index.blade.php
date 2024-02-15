@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>{{$title}}</h1>

		<div class="row justify-content-center mb-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ __('Product finder') }}</div>
					<div class="card-body">
						<form action="{{ route('products.search') }}" method="GET">
							@csrf
							<div class="row mb-3">
								<label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Enter Product Name:') }}</label>
								<div class="col-md-6">
									<input id="text" type="text" class="form-control" name="query" required  autofocus>
								</div>
							</div>
	
							<div class="row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Search') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="row justify-content-center mb-3">
			<h2>Latest</h2>
		</div>

		
		<div class="row">
			@foreach ($latestProducts as $item)
				<div class="col-md-3">
					@include('catalog._product')
				</div>
			@endforeach
		</div>
	</div>
@endsection

@section('title', 'Home Page')

@section('css')
	<style>
		body{
			background: #7d7b7b;
		}
	</style>
@endsection




	
