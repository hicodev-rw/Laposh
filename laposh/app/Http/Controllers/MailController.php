<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
class MailController extends Controller
{
    public function index(){

        
        $data=[
            'subject'=>'Welcome To Laposh',
            'body'=>'Congratulation, your account succesfully. login to access your account'
        ];
        Mail::to($request->email)->send(new MailNotify($data));

   }
}