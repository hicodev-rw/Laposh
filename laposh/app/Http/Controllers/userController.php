<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class userController extends Controller
{
    public function index()
    {
        $users=User::all();
        $roles=Role::all();
        return view('management.static.users')->with('users',$users)->with('roles',$roles);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input =$request->all();
        User::create($input);
        return redirect('users')->with('flash_message','student updated');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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
        User::destroy($id);
        return redirect('users')->with('flash_message','student_deleted');
    }
}
