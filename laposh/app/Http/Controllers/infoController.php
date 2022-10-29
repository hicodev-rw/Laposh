<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel_info;
class infoController extends Controller
{

    public function index()
    {
        $info=Hotel_info::first();
        return $info;
    }

    public function store(Request $request)
    {
        $input=$request->all();
        Hotel_info::create($input);
        return 'Data added succesfully!';

    }


    public function update(Request $request)
    {
        $info=Hotel_info::first();
        $input=$request->all();
        $info->update($input);
        return 'Data updated succesfully!';
    }

    public function uploadLogo(Request $request)
    {
        $data=Hotel_info::first();
            $link = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();
        $logo=array('logo'=>$link);
        $data->update($logo);
        return $data;
    }
}
