<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact(['categories']));
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
            
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('categories')->with('status', 'Category added successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', compact(['category']));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;

        $category->update($request->all());     

        return redirect('categories')->with('status', 'Category updated successfully');
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();

        return redirect('categories')->with('status', 'Category deleted successfully');
    }
}
