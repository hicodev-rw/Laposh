<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
class customerController extends Controller
{
    public function index()
    {
        $customers=User::all();
        return $customers;
    }

    public function create()
    {
        return view('web.mainregister');
    }
    public function myBookings(Request $request)
    {
        $reservations_query=Reservation::with(['status'])->where('user_id',Auth()->user()->id);
        if($request->keyword){
            $reservations_query->where('reference','LIKE','%'.$request->keyword.'%');
        }
        if($request->status){
            $reservations_query->whereHas('status',function($query) use($request){
                $query->where('name',$request->status);
            });
        }
        if($request->owner){
            $reservations_query->whereHas('customer',function($query) use($request){
                $query->where('firstName',$request->owner);
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
        return view('web.dashboard.bookings')->with('bookings',$reservations);
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $isUnique = count(User::where('email',$request->email)->get());
        if($isUnique==0){
        $password=$request->password;
        $hashed = Hash::make($password, [
            'rounds' => 12,
        ]);
        $new = array('password' => $hashed,'role'=>'client');
        $merge = array_merge($input, $new);
        $customer = User::create($merge);
        $customer->assignRole('client');

        $data=[
            'subject'=>'Welcome To Laposh',
            'body'=>'Congratulation, your account succesfully. login to access your account'
        ];
        Mail::to($request->email)->send(new MailNotify($data));


        return redirect('/login');
    }
    else{
        return back()->withErrors([
            'email' => 'account already exists!',
        ])->onlyInput('email');
    }
    }

    public function show($id)
    {
        $customer=User::with('reservations')->find($id);
        if($customer){
            return $customer;
        }
        else{
            $message="customer not Found";
            return $message;  
        }
    }


    public function edit($id)
    {
        $user=User::find($id);
        return view('web.dashboard.edit_profile')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $customer=User::find($id);
        if($customer){
        $password=$request->password;
        $hashed = Hash::make($password, [
            'rounds' => 12,
        ]);
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $customer->update($merge);
        return redirect('/customer/profile')->with('message','profile updated successfully');
        }
        else{

            $message="user not Found";
            return redirect('/customer/profile')->with('message',$message); 
        }
    }

    public function destroy($id)
    {
        $data=User::find($id);
        if($data){
            User::destroy($id);
            $message="Account removed succesfully!";
            return $message;
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }
    public function profile(){
        return view('web.dashboard.profile');
    }
}
