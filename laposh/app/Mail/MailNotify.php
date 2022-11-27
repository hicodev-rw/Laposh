<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];

   
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        return $this->from('hicode250@gmail.com','Laposh Hotel')
        ->subject($this->data['subject'])
        ->view('emails.index')->with('data',$this->data);
    }
}