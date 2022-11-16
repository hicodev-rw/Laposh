<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Category;
use App\Models\Hotel_info;

class webController extends Controller
{
    public function index(Request $request)
    {
        return view('web.home');
    }
    public function rooms(Request $request)
    {
        $categories=Category::all();
        $room_query=Room::with('category');

        if($request->keyword){
            $room_query->where('name','LIKE','%'.$request->keyword.'%');
        }
        if($request->category){
            $room_query->whereHas('category',function($query) use($request){
                $query->where('name',$request->category);
            });
        }

        if($request->sortBy && in_array($request->sortBy,['name','price','created_at'])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='id'; 
        }

        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        }
        else{
            $sortOrder='desc'; 
        }

        if($request->perPage){
            $perPage=$request->perPage;
        }
        else{
            $perPage=5;
        }
        if($request->paginate){
            $rooms=$room_query->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $rooms=$room_query->orderBy($sortBy,$sortOrder)->get();
        }
        //return $rooms;
        return view('web.rooms')->with('rooms',$rooms)->with('category',$categories);
    }
    public function show($id)
    {
        $room=Room::with('category')->find($id);
        // return $room;
        return view('web.room_details')->with('room',$room);
    }
    public function bookable($id)
    {
        $room=Room::with('category')->find($id);
        // return $room;
        return view('web.bookable')->with('room',$room);
    }
    public function bookingForm($id)
    {
        return view('web.booking_form')->with('id',$id);
    }

    public function dashboard()
    {
        $bookings=count(Reservation::where('user_id',auth()->user()->id)->get());
        $ongoing=count(Reservation::where('status_id','=',2)->where('user_id',auth()->user()->id)->get());
        $canceled=count(Reservation::where('status_id','=',4)->where('user_id',auth()->user()->id)->get());
        $closed=count(Reservation::where('status_id','=',3)->where('user_id',auth()->user()->id)->get());
        return view('web.dashboard.index')->with('bookings',$bookings)->with('closed',$closed)->with('canceled',$canceled)->with('ongoing',$ongoing);
    }
    public function cancelBooking(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $input=array('status_id'=>4);
        if($reservation){
            $reservation->update($input);
            $message="reservation was canceled succesfully!";
            // return $message;
        return redirect('/customer/bookings')->with('message',$message);
        }
    }
    public function showReservation($id)
    {
        $reservation=Reservation::find($id);
        return view('web.dashboard.view_booking')->with('booking',$reservation);
    }
    public function about()
    {
        $info=Hotel_info::first();
        return view('web.about')->with('info',$info);
    }
    public function gallery()
    {
        $rooms=Room::all();
        return view('web.gallery')->with('rooms',$rooms);

    }
}
