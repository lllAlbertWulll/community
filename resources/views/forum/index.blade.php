@extends('app')
@section('content')
  <div class="jumbotron">
	<div class="container">
	  <h2>
		欢迎来到『炼药师』社区
		<a class="btn btn-sm btn-danger pull-right" href="/discussions/create" role="button">发表新帖子 »</a>
	  </h2>
	</div>
  </div>
  <div class="container">
	<div class="row">
	  <div class="col-md-9" role="main">
		@foreach($discussions as $discussion)
		  <div class="media">
			<div class="media-left">
			  <a href="">
				<img class="media-object img-circle" alt="64*64" src="{{ $discussion->user->avatar }}" style="width: 64px; height: 64px" >
			  </a>
			</div>
			<div class="media-body">
			  <h4 class="media-heading">
				<a href="/discussions/{{$discussion->id}}">{{ $discussion->title }}</a>
				<div class="media-conversation-meta">
				  <span class="media-conversation-replies">
					<a href="/discussion/154#reply">{{ count($discussion->comments) }}</a>
					回复
				  </span>
				</div>
			  </h4>
			  {{ $discussion->user->name }}
			</div>
		  </div>
		@endforeach
	  </div>
	</div>
  </div>
@endsection