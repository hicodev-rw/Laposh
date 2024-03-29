<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Category;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\Offer;
class roomController extends Controller
{

    public function index(Request $request)
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
        return view('management.static.rooms.rooms')->with('rooms',$rooms)->with('category',$categories);
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
            // return $rooms;
            return view('web.main.list')->with('rooms',$rooms);
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $images=array();
        $isUnique=count(Room::where('name',$input['name'])->get());
        if($isUnique==0){
            foreach($request->images as $file){
                $image = cloudinary()->upload($file->getRealPath())->getSecurePath();
                array_push($images,$image);
                }
                $roomImages = array('images' => $images);
                $merge=array_merge($input,$roomImages);
            $room=Room::create($merge); 
            return redirect('management/rooms')->with('message','room added successfully');
        }
        else{
            return back()->withErrors([
                'name' => 'Room already exists!',
            ])->onlyInput('name');
        }
    }
            
            
    
    public function show($id)
    {
        $room=Room::with(['category','reservation'])->find($id);
        // return $room;
        return view('management.static.rooms.viewroom')->with('room',$room);
    }

    public function edit($id)
    {
        $categories=Category::all();
        $room=Room::find($id);
        return view('management.static.rooms.edit_room')->with('category',$categories)->with('room',$room);
    }
    public function editImages($id)
    {
        $room=Room::find($id);
        return view('management.static.rooms.update_room_images')->with('room',$room);
    }
    public function update(Request $request, $id)
    {
        $room=Room::find($id);
        $op=$room->price;
        $input =$request->all();
        $room->update($input);
        $new=Room::find($id);
        $diff=$new->price - $op ;

        if( $diff!=0){
         $data=[
            'subject'=>"Good News",
            'body'=>$new
        ];
        $users = Subscription::all();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new Offer($data));
            }
        }   
        
        }

       return redirect('/management/rooms')->with('message','room updated successfully');
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return redirect('/management/rooms')->with('message','room deleted successfully');
    }


    //upload room images
public function updateRoomImages(Request $request,$id){
        $images=array();
        $room=Room::find($id);
        if($room){
            foreach($request->file('images') as $file){
                $image = cloudinary()->upload($file->getRealPath())->getSecurePath();
                array_push($images,$image);
                }
                $roomImages = array('images' => $images);
                 $room->update($roomImages);
                 return redirect('/management/rooms')->with('message','room updated successfully');
        }
        else{
            $message='Room not found';
            return $message;
        }
    }
}
