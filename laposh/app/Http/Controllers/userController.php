<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    public function index(Request $request)
    {
        $user_query=User::with(['role']);
        if($request->role){
            $user_query->whereHas('role',function($query) use($request){
                $query->where('name',$request->role);
            });
        }

        if($request->keyword){
            $user_query->where('name','LIKE','%'.$request->keyword.'%');
        }

        if($request->sortBy && in_array($request->sortBy,['id','firstName','lastName','created_at'])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='id'; 
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
            $users=$user_query->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $users=$user_query->orderBy($sortBy,$sortOrder)->get();
        }
        $users=$user_query->get();
        return $users;
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
        $user = User::create($merge);
        return $user;
    }
    else{
        $message='User is already registered';
        return $message;
    }
    }

    public function show($id)
    {
        $user=User::with(['role'])->find($id);
        $permissions=$user->role->permission;
        return $user;
    }

    public function edit($id)
    {
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
        $password = array('password' => $hashed);
        $merge = array_merge($input, $password);
        $user->update($merge);
        $message="User was updated succesfully!";
        return $message;
        }
        else{
            $message="user not Found";
            return $message;  
        }
    }
    public function destroy($id)
    {
        User::destroy($id);
        $message="User removed successfully";
        return $message;
    }

    public function showUploadForm()
    {
        //
    }


    public function storeAvatar(Request $request,$id)
    {
        $user=User::find($id);
        if($user){
            $link = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        $avatar=array('avatar'=>$link);
        $user->update($avatar);
        return $user;
        }
        

    }
}
