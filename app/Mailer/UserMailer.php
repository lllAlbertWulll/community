<?php

namespace App\Mailer;

class UserMailer extends Mailer
{
  public function welcome($user)
  {
	$template = 'welcome';
    $data = ['name' => $user->name, 'confirm_code' => $user->confirm_code];

    $this->sendTo($user, $template, $data);
  }

  public function forgetPassword()
  {

  }
}