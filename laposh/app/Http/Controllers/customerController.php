<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        $isUnique = count(Customer::where('email',$request->email)->get());
        if($isUnique==0){
        $password=$request->password;
        $hashed = Hash::make($password, [
            'rounds' => 12,
        ]);
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $customer = Customer::create($merge);
        return $customer;
    }
    else{
        $message='User is already registered';
        return $message;
    }
    }

    public function show($id)
    {
        $customer=Customer::with('reservations')->find($id);
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
        //
    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $customer=Customer::find($id);
        if($customer){
        $password=$request->password;
        $hashed = Hash::make($password, [
            'rounds' => 12,
        ]);
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $customer->update($merge);
        $message="Profile was updated succesfully!";
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

    // public function login(Request $request)
    // {
    //     $user=Customer::where('email',$request->email)->first();
    //     if($user){
    //         $hashed=$user['password'];
    //         $password=$request->password;
    //         if(Hash::check($password,$hashed)){
    //             $token = $user->createToken('myapitoken');
 
    //          return ['token' => $token->plainTextToken];
    //         }
    //         else{
    //             $message='Incorrect password';
    //             return $message;
    //         }
        
    //     }
    //     else{
    //         $message='User Not found';
    //         return $message;
    //     }
    
    // }

    public function login(Request $request)
    {
        // $user=User::where('email',$request->email)->first();
        // if($user){
        //     $hashed=$user['password'];
        //     $password=$request->password;
        //     if(Hash::check($password,$hashed)){
        //         $token = $user->createToken('myapitoken');
        //      return ['token' => $token->plainTextToken];
        //     }
        //     else{
        //         $message='Incorrect password';
        //         return $message;
        //     }
        
        // }
        // else{
        //     $message='User Not found';
        //     return $message;
        // }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/management/login');
}

}
