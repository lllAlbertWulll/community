@extends('app')
@section('content')
  <div class="container">
	<div class="row">
	  <div class="col-md-6 col-md-offset-3" role="main">
		@if(Session::has('user_login_failed'))
		  <div class="alert alert-danger" role="alert">
			{{ Session::get('user_login_failed') }}
		  </div>
		  @endif
	  {!! Form::open(['url' => '/user/login']) !!}
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
		{!! Form::submit('马上登录', ['class' => 'btn btn-success form-control']) !!}
		{!! Form::close() !!}
	  </div>
	</div>
  </div>
@endsection