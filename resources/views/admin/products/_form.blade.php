<div>
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div>
	{!! Form::label('price', 'Price:') !!}
	{!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div>
	{!! Form::label('category_id', 'Category:') !!}
	{!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div>
	{!! Form::label('products', 'recommended Products:') !!}
	{!! Form::select('products', $products, null, ['class'=>'form-control', 'multiple'=>true, 'name'=>'products[]' ]) !!}
</div>

<div class="input-group">
	<span class="input-group-btn">
	  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		<i class="fa fa-picture-o"></i> Choose
	  </a>
	</span>
	<input id="thumbnail" class="form-control" type="text" name="image">
  </div>
  <div id="holder"></div>

{{-- <div>
	{!! Form::label('image', 'Image:') !!}
	{!! Form::file('image', ['class'=>'form-control']) !!}
</div> --}}

<div class="mt-3">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('Save', ['class'=>'btn btn-primary mt-3']) !!}