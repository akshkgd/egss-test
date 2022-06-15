<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        return view('blog.index', compact('blogs', 'categories'));
    }

    public function createBlog(Request $request)
    {
        $categoryId = Category::findOrFail($request->categoryId);
        $a = new Blog;
        $a->title = $request->title;
        $a->slug = $request->slug;
        $a->description = $request->description;
        $a->category_id = $categoryId->id;
        $a->status = $request->status;
        $a->image = 'img';
        $a->save();
        session()->flash('alert-success', 'New Blog Added Successfully');
        return redirect()->back();
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blog.edit', compact('blog', 'categories'));
    }


    public function updateBlog(Request $request)
    {
        // dd($request->all());
        $categoryId = Category::findOrFail($request->categoryId);
        $a = Blog::findOrFail($request->blogId);
        $a->title = $request->title;
        $a->slug = $request->slug;
        $a->description = $request->description;
        $a->category_id = $categoryId->id;
        $a->status = $request->status;
        $a->image = $request->image;
        $a->save();
        session()->flash('alert-success', 'Blog Updated Successfully');
        return redirect()->back();
    }

    public function deleteBlog($id)
    {
        $a = Blog::findOrFail($id);
        $a->delete();
        session()->flash('alert-success', 'Blog Deleted Successfully');
        return redirect()->back();
    }
}
