<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return $categories;
    }
    public function create()
    {
        //
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
        //
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
