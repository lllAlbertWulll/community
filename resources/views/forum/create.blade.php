@extends('app')
@section('content')
  @include('editor::head')
  <div class="container">
	<div class="row">
	  <div class="col-md-10 col-md-offset-1" role="main">
	  {!! Form::open(['url' => '/discussions']) !!}
	  <!-- Title Field -->
		@include('forum.form')
		<div>
		  {!! Form::submit('发布新帖子', ['class' => 'btn btn-primary pull-right']) !!}
		</div>
		{!! Form::close() !!}
	  </div>
	</div>
  </div>
@endsection