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
        $reservations_query=Reservation::with(['status','customer']);

        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%');
        }
        if($request->status){
            $reservations_query->whereHas('status',function($query) use($request){
                $query->where('name',$request->status);
            });
        }
        if($request->owner){
            $reservations_query->whereHas('customer',function($query) use($request){
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
            $reservations=$reservations_query->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $reservations=$reservations_query->orderBy($sortBy,$sortOrder)->get();
        }
        return view('management.static.bookings')->with('bookings',$reservations);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $ref=$this->generateRandomString();
        $status = array('status_id' => 1,'reference'=>$ref);
        $merge = array_merge($input, $status);
        $reservation=Reservation::create($merge);
        return $reservation;

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $input=$request->all();
        if($reservation){
            $reservation->update($input);
            $message="reservation was updated succesfully!";
            return $message;
        }
        else{
            $message="reservation not Found";
            return $message;  
        }
    }

    public function readForCheckIn(Request $request)
    {
        $date = date('Y-m-d');
        $reservations_query=Reservation::with('room','customer');
        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%')->where('check_in_date',$date);
        }
        if($request->owner){
            $reservations_query->whereHas('customer',function($query) use($request){
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
            $reservations=$reservations_query->where('check_in_date',$date)->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $reservations=$reservations_query->where('check_in_date',$date)->orderBy($sortBy,$sortOrder)->get();
        }
        return $reservations;
    }

    
    public function readForCheckOut(Request $request)
    {
        $reservations_query=Reservation::with('room','customer');
        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%')->where('status_id',2);
        }
        if($request->owner){
            $reservations_query->whereHas('customer',function($query) use($request){
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
        return $reservations;
    }


    public function checkin(Request $request, $id)
    {
    $reservation=Reservation::find($id);
    $input=array('status_id'=>2);
    if($reservation){
        $reservation->update($input);
        $message="reservation was checked in succesfully!";
        return $message;
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
            $message="reservation was closed succesfully!";
            return $message;
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
            return $message;
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
