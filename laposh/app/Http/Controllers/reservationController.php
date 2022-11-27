<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
class reservationController extends Controller
{
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

    public function index(Request $request)
    {
        $reservations=Reservation::all();

        return view('management.static.bookings')->with('bookings',$reservations);
    }
    public function unpaid(Request $request)
    {
        $reservations=Reservation::where('status_id',5)->get();

        return view('management.static.pendingpayment')->with('bookings',$reservations);
    }
    public function pending(Request $request)
    {
        $reservations=Reservation::where('status_id',1)->get();

        return view('management.static.pending')->with('bookings',$reservations);
    }
    public function closed(Request $request)
    {
        $reservations=Reservation::where('status_id',3)->get();

        return view('management.static.closed')->with('bookings',$reservations);
    }
    public function cancelled(Request $request)
    {
        $reservations=Reservation::where('status_id',4)->get();

        return view('management.static.cancelled')->with('bookings',$reservations);
    }
    public function ongoing(Request $request)
    {
        $reservations=Reservation::where('status_id',2)->get();

        return view('management.static.ongoing')->with('bookings',$reservations);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $ref=$this->generateRandomString();
        $status = array('status_id' => 5,'reference'=>$ref);
        $merge = array_merge($input, $status);
        $reservation=Reservation::create($merge);
        return redirect('/stripe/payment/start');


    }

    public function show($id)
    {
        $reservation=Reservation::find($id);
        return view('management.static.view_booking')->with('booking',$reservation);
    }

    public function edit($id)
    {
        $reservation=Reservation::find($id);
        return view('management.static.extend')->with('reservation',$reservation);
    }

    public function update(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $input=$request->all();
        if($reservation){
            $reservation->update($input);
            $message="reservation was updated succesfully!";
          //  return $message;
            return redirect('/management/bookings')->with('message',$message);
        }
        else{
            $message="reservation not Found";
            return $message;  
        }
    }

    public function readForCheckIn(Request $request)
    {
        $date = date('Y-m-d');
        $reservations_query=Reservation::with('room','user');
        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%')->where('check_in_date',$date);
        }
        if($request->owner){
            $reservations_query->whereHas('user',function($query) use($request){
                $query->where('firstName',$request->owner);
            });
        }
        if($request->sortBy && in_array($request->sortBy,['reference','created_at',])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='created_at'; 
        }

        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        }
        else{
            $sortOrder='asc'; 
        }

        if($request->perPage){
            $perPage=$request->perPage;
        }
        else{
            $perPage=8;
        }
        if($request->paginate){
            $reservations=$reservations_query->where('check_in_date',$date)->where('status_id',1)->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $reservations=$reservations_query->where('check_in_date',$date)->where('status_id',1)->orderBy($sortBy,$sortOrder)->get();
        }
        //return $reservations;
        return view('management.static.checkinList')->with('bookings',$reservations);
    }

    
    public function readForCheckOut(Request $request)
    {
        $reservations_query=Reservation::with('room','user');
        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%')->where('status_id',2);
        }
        if($request->owner){
            $reservations_query->whereHas('user',function($query) use($request){
                $query->where('firstName',$request->owner)->where('check_in_date',$date);
            });
        }
        if($request->sortBy && in_array($request->sortBy,['reference','created_at',])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='created_at'; 
        }

        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        }
        else{
            $sortOrder='asc'; 
        }

        if($request->perPage){
            $perPage=$request->perPage;
        }
        else{
            $perPage=8;
        }
        if($request->paginate){
            $reservations=$reservations_query->where('status_id',2)->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $reservations=$reservations_query->where('status_id',2)->orderBy($sortBy,$sortOrder)->get();
        }
        // return $reservations;
        return view('management.static.checkoutList')->with('bookings',$reservations);
    }


    public function checkin(Request $request, $id)
    {
    $reservation=Reservation::find($id);
    $input=array('status_id'=>2);
    if($reservation){
        $reservation->update($input);
       // $message="reservation was checked in succesfully!";
       // return $message;
        return redirect('/management/check-in-list')->with('message','room checked in successfully');
    }
    else{
        $message="reservation not Found";
        return $message;  
    }
}

    public function checkout(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $input=array('status_id'=>3);
        if($reservation){
            $reservation->update($input);
            // $message="reservation was closed succesfully!";
            // return $message;
            return redirect('/management/check-out-list')->with('message','room checked out successfully');
        }
        else{
            $message="reservation not Found";
            return $message;  
        }
    }

    public function cancelBooking(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $input=array('status_id'=>4);
        if($reservation){
            $reservation->update($input);
            $message="reservation was canceled succesfully!";
            // return $message;
        return redirect('/management/bookings')->with('message',$message);
        }
        else{
            $message="reservation not Found";
            return $message;  
        }
    }

    //if needed to delete
    public function destroy($id)
    {
        $data=Reservation::find($id);
        if($data){
            Reservation::destroy($id);
            $message="booking was removed succesfully!";
            return $message;
        }
        else{
            $message="booking not Found";
            return $message;  
        }
    }
}
