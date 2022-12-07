<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel_info;
class infoController extends Controller
{

    public function index()
    {
        $info=Hotel_info::first();
        return view('management.static.settings.settings')->with('info',$info);
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $link = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();
        $logo=array('logo'=>$link);
        $merge=array_merge($input,$logo);
        Hotel_info::create($merge);
        return redirect('/management/settings')->with('message','Info updated successfully');

    }
    public function update(Request $request)
    {
        $info=Hotel_info::first();
        $input=$request->all();
        if($request->logo!=null){
            $link = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();
            $logo=array('logo'=>$link);
            $merge=array_merge($input,$logo);
            $info->update($merge);
        }
        else{
            $info->update($input);
        }


        return redirect('/management/settings')->with('message','Info updated successfully');
    }

    public function updateLogo(Request $request)
    {
        $data=Hotel_info::first();
            $link = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();
        $logo=array('logo'=>$link);
        $data->update($logo);
        return $data;
    }
}
