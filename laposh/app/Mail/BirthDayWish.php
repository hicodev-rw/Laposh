<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthDayWish extends Mailable
{
    use Queueable, SerializesModels;
  
    public $user;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hicode250@gmail.com','Laposh Hotel')
        ->subject('Happy Birthday '. $this->user->name)
                    ->view('emails.birthdayWish');
    }
}
