<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verifyEmail)
    {
            $this->mail = $verifyEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject("Verify Email Address For Sakura Hospital")
                ->view("mail.verify")
                ->with([
                    'name' => $this->mail['title'],
                    'token' => $this->mail['token']
                ]);
    }
}
