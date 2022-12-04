<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messages as Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Mail\MailToClients;
class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::all();
        return view('management.static.messages.messages')->with('messages',$messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Message::create($request->all());

        $data=[
            'subject'=>'Email received',
            'body'=>'your email was received successfully, we will reach you soon!'
        ];
        Mail::to($request->email)->send(new MailNotify($data));


        return redirect('/');
    }
    public function reply(Request $request)
    {

        $data=[
            'subject'=>$request->subject,
            'body'=>$request->mail
        ];
        Mail::to($request->to)->send(new MailNotify($data));

        return redirect('/management/messages')->with('message','message sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=Message::find($id);
        return view('management.static.messages.read')->with('message',$message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $message=Message::find($id);
        return view('management.static.messages.reply')->with('message',$message);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $data=[
            'subject'=>$request->subject,
            'body'=>$request->mail
        ];
        $users = User::all();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new MailToClients($data));
            }
        }
        return redirect('/management/messages')->with('message','message sent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
