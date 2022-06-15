<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Models\Category;
use App\Models\Blog;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $blogs = Blog::all();
    return view('welcome', compact('blogs'));
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::post('/create-blog', [BlogController::class, 'createBlog'])->name('create-blog');
Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('edit-blog');
Route::post('/update-blog', [BlogController::class, 'updateBlog'])->name('update-blog');
Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');

Route::get('/get-blogs', [BlogController::class, 'getBlogs']);


Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('create-category');
Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('/update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

Route::get('/category', [CategoryController::class, 'category']);

