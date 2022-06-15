@extends('layouts.egss')
@section('content')
@include('layouts.header')



@include('layouts.alerts')
<div class="container">
    <h2>Create new blog</h2>
    <form action="{{route('create-blog')}}" method="post" >
        @csrf
    <input type="text" name="title" id="" placeholder="Enter blog title">
    <input type="text" name="slug" id="" placeholder="Enter the slug">
    <input type="text" name="description" id="" placeholder="Enter the description">
    <input type="text" name="image" id="" placeholder="Enter the image name">
    
        <select class="form-control-select" name="categoryId">

            <option value="" selected="selected" disabled="disabled">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
   

        <select class="form-control-select" name="status">

            <option value="" selected="selected" disabled="disabled">Select Status</option>
            
                <option value="1">Public</option>
                <option value="0">Private</option>
            
        </select>
    <button type="submit" class="btn">Create New Blog</button>
    </form>

</div>

    <div class="container">
        <h2>All Categories</h2>

        @foreach ($blogs as $blog)
            <div class="card-category">
                <div class="card-body">
                    <div class="blog-index">
                        <h3 class="card-title">{{ $blog->title }}></h5>
                        <div class="tag">{{$blog->category->name}}</div>
                    </div>
                    <p class="">{{$blog->description}}</p>
                    
                    <a href="{{ route('edit-blog', $blog->id) }}" class="link">Edit</a>
                    <a href="{{ route('delete-blog', $blog->id) }}" class="link">Delete</a>

                </div>
            </div>
            @endforeach
    </div>

@endsection