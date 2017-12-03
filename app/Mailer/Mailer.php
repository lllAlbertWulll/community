<?php

namespace App\Mailer;

use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{

  public function sendTo($user, $template, $data = [])
  {
	$template = new SendCloudTemplate($template, $data);

	Mail::raw($template, function ($message) use ($user) {
	  $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
	  $message->to($user->email);
	});
  }
}