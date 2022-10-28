<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Category;
class roomController extends Controller
{

    public function index()
    {
        $rooms=Room::all();
        return $rooms;
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
