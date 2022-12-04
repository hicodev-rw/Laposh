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
        //return $categories;
        return view('management.static.categories.categories')->with('categories',$categories);
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $category=Category::create($input);
       // return $category;
        return redirect('management/categories')->with('message','category created successfully');
    }

    public function show($id)
    {
        $category=Category::find($id);
        $rooms=$category->rooms;
        // return $category;
        return view('management.static.categories.view_category')->with('category',$category)->with('rooms',$rooms);

    }


    public function edit($id)
    {
        $categories=Category::all();
        $category=Category::find($id);
        return view('management.static.categories.edit_category')->with('category',$category)->with('categories',$categories);
    }


    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $input =$request->all();
        $category->update($input);
        //return $category;
        return redirect('management/categories')->with('message','category updated successfully');
    }


    public function destroy($id)
    {
        Category::destroy($id);
        $message='category removed successfully';
       // return $message;
       return redirect('management/categories')->with('message','category removed successfully');
    }
}
