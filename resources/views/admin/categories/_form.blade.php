<div>
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="mt-3">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('Save', ['class'=>'btn btn-primary mt-3']) !!}
