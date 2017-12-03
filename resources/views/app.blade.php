<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Community</title>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/font-awesome.css">
  <link rel="stylesheet" href="/css/jquery.Jcrop.css">
  <link rel="stylesheet" href="/css/style.css">

  <script src="/js/jquery.js"></script>
  <script src="/js/jquery.Jcrop.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.form.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
			  aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/">炼药🧙‍</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="/">首页</a></li>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		@if(Auth::check())
		  <li><a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="">{{ Auth::user()->name }}</a>
			<ul class="dropdown-menu" aria-labelledby="dLabel">
			  <li><a href="/user/avatar"><i class="fa fa-user"></i> 更换头像</a></li>
			  {{--<li><a href=""><i class="fa fa-cog"></i> 更换密码</a></li>--}}
			  {{--<li><a href=""><i class="fa fa-heart"></i> 特别感谢</a></li>--}}
			  <li role="separator" class="divider"></li>
			  <li><a href="/logout"><i class="fa fa-sign-out"></i> 退出登录</a></li>
			</ul>
		  </li>
		  <li><img src="{{ Auth::user()->avatar }}" class="img-circle" width="50" height="50" alt=""></li>

		@else
		  <li><a href="/user/login">登 录</a></li>
		  <li><a href="/user/register">注 册</a></li>
		@endif
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>
<div id="app">
  @yield('content')
</div>
</body>
</html>