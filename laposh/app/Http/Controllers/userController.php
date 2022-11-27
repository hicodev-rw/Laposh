<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
 
class userController extends Controller
{
    public function index(Request $request)
    {
        $roles=RoleModel::whereNot('name','client')->get();
        $users=User::with('roles')->whereNot('role','client')->get();
        return view('management.static.users')->with('users',$users)->with('roles',$roles);
    }
    public function clients(Request $request)
    {
        $roles=RoleModel::where('name','client')->get();
        $users=User::with('roles')->where('role','client')->get();
        return view('management.static.clients')->with('users',$users);
    }
    public function create()
    {
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
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $link = cloudinary()->upload($request->avatar->getRealPath())->getSecurePath();
        $avatar=array('avatar'=>$link);
        $merge = array_merge($merge, $avatar);
        $user = User::create($merge);
        $user->assignRole($input['role']);
        // return $user;
        return redirect('/management/users')->with('message','user added successfully');
    }
    else{
        $message='User is already registered';
        return $message;
    }
    }

    public function show($id)
    {
        $user=User::find($id);
        //$permissions=$user->roles->permissions;
        //return $user;
        return view('management.static.view_user')->with('user',$user);
    }

    public function edit($id)
    {
        $user=User::find($id);
        $roles=RoleModel::whereNot('name','client')->get();
        return view('management.static.edit_user')->with('user',$user)->with('roles',$roles);
    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $user=User::find($id);
        if($user){
        $password=$request->password;
        $hashed = Hash::make($password, [
            'rounds' => 12,
        ]);
        $check=Hash::check($password, $hashed);
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $user->update($merge);
        return redirect('/management/users/'.$id)->with('message','user updated successfully');
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('management/users')->with('message','user removed successfully');
    }

    public function showUploadForm()
    {
        //
    }


    public function updateAvatar(Request $request,$id)
    {
        $user=User::find($id);
        if($user){
        $link = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        $avatar=array('avatar'=>$link);
        $user->update($avatar);
        return $user;
        }
    }

    public function profile(){
        return view('management.static.profile');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials) && Auth()->user()->role=='client') {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        else if(Auth::attempt($credentials))
          {
            return redirect()->intended('management/dashboard');
            }
      else{
        return back()->withErrors([
            'email' => 'Account Already exists!',
        ])->onlyInput('email');
    
    }
}
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}

public function grantPermissions(Request $request,$id)
{
    $input=$request->all();
    $permissions=array_values($input);
    unset($permissions[0]);
    unset($permissions[1]);
    $permissions=array_values($permissions);
    $user=User::find($id);
    $role = Role::where('name',$user->role)->first();
    $role->givePermissionTo($permissions);
    return redirect('/management/roles/'.$id.'/edit');
}
public function revokePermissions(Request $request,$id)
{
    $input=$request->all();
    $permissions=array_values($input);
    unset($permissions[0]);
    unset($permissions[1]);
    $permissions=array_values($permissions);
    $user=User::find($id);
    $role = Role::where('name',$user->role)->first();
    $role->revokePermissionTo($permissions);
    return redirect('/management/roles/'.$id.'/edit');
}
}
