<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Response;
use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

  /**
   * UsersController constructor.
   */
  public function __construct()
  {
//	$this->middleware('auth', ['except' => ['register', 'login']]);
  }

  public function register()
  {
	return view('users.register');
  }

  public function index()
  {

  }

  public function store(UserRegisterRequest $request)
  {
//	dd($request->all());
	/*
	 * 1. 保存用户数据
	 * 2. 重定向
	 * 3. send Email
	 */
	$data = [
	  'name' => $request->get('name'),
	  'email' => $request->get('email'),
	  'password' => $request->get('password'),
	  'avatar' => '/images/default-avatar.png',
	  'confirm_code' => str_random(48),
	];
	User::register($data);

	return redirect('/');
  }

  public function confirmEmail($confirm_code)
  {
	$user = User::where('confirm_code', $confirm_code)->first();
	if (is_null($user)) {
	  return redirect('/');
	}
	$user->is_confirmed = 1;
	$user->confirm_code = str_random(48);
	$user->save();

	return redirect('user/login');
  }

  public function login()
  {
	return view('users.login');
  }

  public function signin(UserLoginRequest $request)
  {
//    dd($request->all());

	$data = [
	  'email' => $request->get('email'),
	  'password' => $request->get('password'),
	  'is_confirmed' => 1
	];

	if (Auth::attempt($data)) {
	  return redirect('/');
	}
	Session::flash('user_login_failed', '密码不正确或邮箱没验证');
	return redirect('user/login')->withInput();
  }

  public function logout()
  {
	Auth::logout();
	return redirect('/');
  }

  public function avatar()
  {
	return view('users.avatar');
  }

  public function changeAvatar(Request $request)
  {
//    dd('avatar');
	$file = $request->file('avatar');
	$input = array('image' => $file);
	$rules = array(
	  'image' => 'image'
	);
	$validator = Validator::make($input, $rules);
	if ($validator->fails()) {
	  return Response::json([
		'success' => false,
		'errors' => $validator->getMessageBag()->toArray()
	  ]);
	}
	$destinationPath = 'uploads/';
	$filename = Auth::user()->id . '_' . time() . $file->getClientOriginalName();
	$file->move($destinationPath, $filename);
	Image::make($destinationPath . $filename)->fit(400)->save();

	return Response::json([
	  'success' => true,
	  'avatar' => asset($destinationPath . $filename),
	  'image' => $destinationPath.$filename
	]);
  }

  public function cropAvatar(Request $request)
  {
	// dd($request->all());
	$photo = $request->get('photo');
	$width = (int)$request->get('w');
	$height = (int)$request->get('h');
	$xAlign = (int)$request->get('x');
	$yAlign = (int)$request->get('y');

	Image::make($photo)->crop($width, $height, $xAlign, $yAlign)->save();

	$user = Auth::user();
	$user->avatar = asset($photo);
	$user->save();

	return redirect('/user/avatar');
  }
}
