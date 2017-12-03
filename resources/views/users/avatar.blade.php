@extends('app')
@section('content')
  <div class="container">
	<div class="row">
	  <div class="col-md-6 col-md-offset-3">
		<div class="text-center">
		  <div id="validation-errors"></div>
		  <img src="{{Auth::user()->avatar}}" width="120" height="120" class="img-circle" id="user-avatar" alt="">
		  {!! Form::open(['url'=>'/avatar','files'=>true,'id'=>'avatar']) !!}
		  <div class="text-center">
			<button type="button" class="btn btn-success avatar-button" id="upload-avatar">上传新的头像</button>
		  </div>
		  {!! Form::file('avatar',['class'=>'avatar','id'=>'image']) !!}
		  {!! Form::close() !!}
		  <div class="span5">
			<div id="output" style="display:none">
			</div>
		  </div>
		</div>
	  </div>
	</div>
	@include('users.crop')
  </div>
  <script>
    $(document).ready(function() {
      var options = {
        beforeSubmit:  showRequest,
        success:       showResponse,
        dataType: 'json'
      };
      $('#image').on('change', function(){
        $('#upload-avatar').html('正在上传...');
        $('#avatar').ajaxForm(options).submit();
      });
    });
    function showRequest() {
      $("#validation-errors").hide().empty();
      $("#output").css('display','none');
      return true;
    }

    function showResponse(response)  {
      if(response.success == false)
      {
        var responseErrors = response.errors;
        $.each(responseErrors, function(index, value)
        {
          if (value.length != 0)
          {
            $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
          }
        });
        $("#validation-errors").show();
      } else {
//        $('#user-avatar').attr('src',response.avatar);
//        $('#upload-avatar').html('更换新的头像');
		var cropBox = $("#cropbox");
		cropBox.attr('src', response.avatar);
		$('#photo').val(response.image);
		$('#upload-avatar').html('更换新头像');
		$('#exampleModal').modal('show');
		cropBox.Jcrop({
		  aspectRatio: 1,// 选框宽高比。说明：width/height
		  onSelect: updateCoords,
		  setSelect: [120, 120, 10, 10]
		});
		$('.jcrop-holder img').attr('src', response.avatar);
      }
      function updateCoords(c) {
		$('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
      }

      function checkCoords() {
		if (parseInt($('$w').val())) return true;
		alert('请选择图片.');
		return false;
      }
    }
  </script>
@endsection