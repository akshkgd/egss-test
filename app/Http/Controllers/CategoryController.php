<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function createCategory(Request $request)
    {
        $a = new Category;
        $a->name = $request->name;
        $a->slug = $request->slug;
        $a->save();
        session()->flash('alert-success', 'New Category Added Successfully');
        return redirect()->back();
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    public function updateCategory(Request $request)
    {
        $a = Category::findOrFail($request->categoryId);
        $a->name = $request->name;
        $a->slug = $request->slug;
        $a->save();
        session()->flash('alert-success', 'Category Updated Successfully');
        return redirect()->back();
    }

    public function deleteCategory($id){
        $a = Category::findOrFail($id);
        $a->delete();
        session()->flash('alert-success', 'Category Deleted Successfully');
        return redirect()->back();
    }
}
