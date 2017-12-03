<?php

namespace App;

use App\Events\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
	'name', 'email', 'password', 'avatar', 'confirm_code'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
	'password', 'remember_token',
  ];

  public function discussions()
  {
	// 当获得一个 user 时，可以通过 $user->discussions 获取该用户发布的所有帖子
	return $this->hasMany(Discussion::class);
  }

  public function comments()
  {
	return $this->hasMany(Comment::class);
  }

  public function setPasswordAttribute($password)
  {
	$this->attributes['password'] = Hash::make($password);
  }

  public static function register(array $attributes)
  {
    $user = static::create($attributes);

    // events
	event(new UserRegistered($user));

    return $user;
  }
}
