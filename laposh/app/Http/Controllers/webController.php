<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Category;
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
    public function bookingForm()
    {
        return view('web.booking_form');
    }
}
