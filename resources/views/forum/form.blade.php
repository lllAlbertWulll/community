<!-- Title Field -->
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('title'))
  <span class="help-block">
	<strong>{{ $errors->first('title') }}</strong>
  </span>
@endif
<!-- Body Field -->
<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
  <div class="editor">
	{!! Form::textarea('body', null, ['class' => 'form-control', 'id'=>'myEditor']) !!}
  </div>
</div>
@if ($errors->has('body'))
  <span class="help-block">
	<strong>{{ $errors->first('body') }}</strong>
  </span>
@endif