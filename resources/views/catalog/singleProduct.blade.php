@extends('layouts.app')
 
@section('content')
    <div class="container">
 
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->image) }}" alt="" style="width: 250px">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <div class="text-danger h2">{{ $product->price }}</div>
				{!! $html !!}
            </div>
        </div>
 
        <div class="my-5">
            <h2>Description</h2>
            {!! $product->description !!}
        </div>

		<h2>Recommended</h2>
		<div class="row">
			@foreach ($product->products as $item)
				<div class="col-md-2">
					@include('catalog._product')
				</div>
			@endforeach
		</div>
    </div>
@endsection