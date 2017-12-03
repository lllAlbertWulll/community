@extends('app')
@section('content')
  <div class="container">
	<div class="row">
	  <div class="col-md-6 col-md-offset-3" role="main">
	  {{--@if($errors->any())--}}
	  {{--<ul class="list-group">--}}
	  {{--@foreach($errors->all() as $error)--}}
	  {{--<li class="list-group-item list-group-item-danger">{{ $error }}</li>--}}
	  {{--@endforeach--}}
	  {{--</ul>--}}
	  {{--@endif--}}
	  {!! Form::open(['url' => '/user/register']) !!}
	  <!-- Name Field -->
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		  {!! Form::label('name', '用户名:') !!}
		  {!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('name'))
		  <span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		  </span>
		@endif
	  <!-- Email Field -->
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		  {!! Form::label('email', '邮箱:') !!}
		  {!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('email'))
		  <span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		  </span>
		@endif
		<!-- Password Field -->
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		  {!! Form::label('password', '密码:') !!}
		  {!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('password'))
		  <span class="help-block">
			<strong>{{ $errors->first('password') }}</strong>
		  </span>
		@endif
		<!-- Password_confirmation Field -->
		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
		  {!! Form::label('password_confirmation', '确认密码:') !!}
		  {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
		@if ($errors->has('password_confirmation'))
		  <span class="help-block">
			<strong>{{ $errors->first('password_confirmation') }}</strong>
		  </span>
		@endif
		{!! Form::submit('马上注册', ['class' => 'btn btn-success form-control']) !!}
		{!! Form::close() !!}
	  </div>
	</div>
  </div>
@endsection