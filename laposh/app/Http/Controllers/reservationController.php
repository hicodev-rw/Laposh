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
        $reservations_query=Reservation::with(['status']);
        if($request->status){
            $reservations_query->whereHas('status',function($query) use($request){
                $query->where('name',$request->status);
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
        return $reservations;
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
