<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Category;
class roomController extends Controller
{

    public function index(Request $request)
    {
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

        return $rooms;
    }
    public function list(Request $request){
        $from=date($request->check_in_date);
        $to=date($request->check_out_date);
        $blocked=Reservation::distinct()->where('check_in_date', '=', $from)->orWhere('check_out_date', '=', $to)->orWhere([['check_in_date', '<', $from],['check_out_date', '>', $to]])->orWhere(function($query)use ($request){
            $query->whereBetween('check_in_date',array($request->check_in_date,$request->check_out_date))
                ->orWhereBetween('check_out_date',array($request->check_in_date,$request->check_out_date));
        })->get('room_id');

        $keys=array();
        for ($x = 0; $x < count($blocked); $x++) {
        array_push($keys,$blocked[$x]['room_id']);
        }

        $room_query = Room::with('category');
        if($request->category){
            $room_query->whereHas('category',function($query) use($request,$keys){
                $query->where('name',$request->category);
            });
        }

        if($request->sortBy && in_array($request->sortBy,['name','price','created_at'])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='price'; 
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
            $rooms=$room_query->whereNotIn('id', $keys)->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $rooms=$room_query->whereNotIn('id', $keys)->orderBy($sortBy,$sortOrder)->get();
        }
            return $rooms;
    }


    public function create()
    {
    }
    public function store(Request $request)
    {
        $input=$request->all();
        $isUnique=count(Room::where('name',$input['name'])->get());
        if($isUnique==0){
            $room=Room::create($input); 
            return $room;
        }
        else{
       $message='the name of room must be unique';
       return $message;
        }
    }
            
            
    
    public function show($id)
    {
        $room=Room::with('category')->find($id);
        return $room;
    }

    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
        $room=Room::find($id);
        $input =$request->all();
        $room->update($input);
        return $room;
    }

    public function destroy($id)
    {
        Room::destroy($id);
        $message='Room was removed Succesfully!';
        return $message;
    }


    //upload room images
    public function addRoomImages(Request $request,$id){
        $images=array();
        $room=Room::find($id);
        if($room){
            foreach($request->file('file') as $file){
                $image = cloudinary()->upload($file->getRealPath())->getSecurePath();
                array_push($images,$image);
                }
                $roomImages = array('images' => $images);
                $room->update($roomImages);
                return $room;
        }
        else{
            $message='Room not found';
            return $message;
        }
    }

    //popular booked room
    public function popular()
    {

    }
}
