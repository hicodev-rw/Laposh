<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
class statusController extends Controller
{
    public function index()
    {
        $statuses=Status::all();
        return $statuses;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $status=Status::create($input);
        return $status;
    }

    public function show($id)
    {
        $status=Status::find($id);
        if($status){
            $reservations=$status->reservations;
            return $status;
        }
        else{
            $message="error: 404";
            return $message;
        }
        
    }
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $status=Status::find($id);
        $input=$request->all();
        if($status){
            $status->update($input);
            $message="status was updated succesfully!";
            return $message;
        }
        else{
            $message="status not Found";
            return $message;  
        }
    }

    public function destroy($id)
    {
        $data=Status::find($id);
        if($data){
            Status::destroy($id);
            $message="status was removed succesfully!";
            return $message;
        }
        else{
            $message="status not Found";
            return $message;  
        }
    }
}
