<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject = 'Reset your account password';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->from($this->data['support_email'], "IT Helpdesk - Legacy FA")->replyTo($this->data['support_email'], "IT Helpdesk - Legacy FA")->markdown('emails.users.reset-password');
    }
}
