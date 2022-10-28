<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
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
public function list(){

    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        $input=$request->all();
        $room=Room::create($input);
        return $room;
    }

    public function show($id)
    {
        $room=Room::find($id);
        $images=$room->images;
        $room->images=explode(',',$images);
        $category=$room->category;
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
}
