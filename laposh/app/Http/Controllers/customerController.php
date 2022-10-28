<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class customerController extends Controller
{
    public function index()
    {
        $customers=Customer::all();
        return $customers;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $customer=Customer::create($input);
        return $customer;
    }

    public function show($id)
    {
        $customer=Customer::find($id);
        if($customer){
            $reservations=$customer->reservations;
            return $customer;
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $customer=Customer::find($id);
        $input=$request->all();
        if($customer){
            $customer->update($input);
            $message="client was updated succesfully!";
            return $message;
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }

    public function destroy($id)
    {
        $data=Customer::find($id);
        if($data){
            Customer::destroy($id);
            $message="client was removed succesfully!";
            return $message;
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }
}
