<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $bookings=count(Reservation::all());
        $ongoing=count(Reservation::all()->where('status_id','=',2));
        $canceled=count(Reservation::all()->where('status_id','=',4));
        $closed=count(Reservation::all()->where('status_id','=',3));
        $rooms=count(Room::all());
        $categories=count(Category::all());
        $clients=count(Customer::all());
        $response=['bookings'=>$bookings,'rooms'=>$rooms,'categories'=>$categories,'clients'=>$clients,'ongoing deals'=>$ongoing,'closed deals'=>$closed,'canceled deals'=>$canceled];
        return $response;
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
