<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Reservation;
use App\Models\Payment;
use DateTime;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function generateRandomString() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $reference=$randomString.'-'.rand(1111111,9999999);
        return $reference;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking=Reservation::where('user_id',auth()->user()->id)->latest()->first();

        $datetime_1 = $booking->check_in_date; 
        $datetime_2 = $booking->check_out_date; 
         
        $start_datetime = new DateTime($datetime_1); 
        $diff = $start_datetime->diff(new DateTime($datetime_2)); 
        $total_hours = ($diff->days * 24); 

        $amount=$booking->room->price*$total_hours;
        return view('web.stripe')->with('booking',$booking)->with('amount',$amount)->with('days',$diff->days)->with('hours',$diff->days*24);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
            "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Room Payment" 
        ]);
      
        Payment::create(["booking_id" => $request->booking_id,
        "amount" => $request->amount,
        "payment_option" => 'card',
        "reference" => $this->generateRandomString(),
        "currency" => "usd",
        "description" => "Test payment from LaravelTus.com."
    ]);
    $reservation=Reservation::find($request->booking_id);
    $reservation->update(['status_id'=>1]);
              
        return redirect('/customer/bookings')->with('message','Your reservation was set successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
