<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
         return view('categories',compact('categories'));
       
    }
    public function etitaa()
    {
        $categories = Category::all();
         return view('categories',compact('categories'));
       
    }

    public function add()
    {
        return view('add-category');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Category::create($input);

        return redirect('/categories');
        
    }

    public function edit(Category $category)
    {
        // $category = Category::find($category);

        // dump('edit');
        

        return view('/edit-category',compact('category'));
    }

    public function update(Request $request,$category)
    {
        $input = $request->all();
        $category = Category::find($category);
        $category->name = $input['name'];
        $category->save();

        return redirect('/categories');
    }

    public function delete($category)
    {
        Category::find($category)->delete();

        return redirect()->back();
    }

}
