<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        $cat_query=Category::with(['rooms']);

        if($request->sortBy && in_array($request->sortBy,['name','created_at'])){
            $sortBy=$request->sortBy;
        }
        else{
            $sortBy='name'; 
        }

        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        }
        else{
            $sortOrder='desc'; 
        }

        if($request->perPage){
            $perPage=$request->perPage;
        }
        else{
            $perPage=8;
        }
        if($request->paginate){
            $categories=$cat_query->orderBy($sortBy,$sortOrder)->paginate($perPage);
        }
        else{
            $categories=$cat_query->orderBy($sortBy,$sortOrder)->get();
        }
        return $categories;
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $category=Category::create($input);
        return $category;
    }

    public function show($id)
    {
        $category=Category::find($id);
        $rooms=$category->rooms;
        return $category;
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $input =$request->all();
        $category->update($input);
        return $category;
    }


    public function destroy($id)
    {
        Category::destroy($id);
        $message='category removed successfully';
        return $message;
    }
}
