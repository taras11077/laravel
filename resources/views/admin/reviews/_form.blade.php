<div>
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="mt-3">
	{!! Form::label('content', 'Content:') !!}
	{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('Save', ['class'=>'btn btn-primary mt-3']) !!}