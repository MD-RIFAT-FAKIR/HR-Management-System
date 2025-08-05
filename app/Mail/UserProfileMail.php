<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserProfileMail extends Mailable {
  use Queueable, SerializesModels;

  public $user;

  public function __construct($user) {
    $this->user = $user;
  }

  public function build() {
    return $this->markdown('emails.user_profile')->subject(config('app.name').',User Profile Email');
  }


}











?>