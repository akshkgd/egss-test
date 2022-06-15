@extends('layouts.egss')
@section('content')
@include('layouts.header')

@include('layouts.alerts')
    <div class="container">
        <h2>Edit blog</h2>
        <form action="{{route('update-blog')}}" method="post" >
            @csrf
            <input type="hidden" name="blogId" id="" value="{{$blog->id}}">
        <input type="text" name="title" id="" placeholder="Enter blog title" value="{{$blog->title}}">
        <input type="text" name="slug" id="" placeholder="Enter the slug" value="{{$blog->slug}}">
        <input type="text" name="description" id="" placeholder="Enter the description"value="{{$blog->description}}">
        <input type="text" name="image" id="" placeholder="Enter the image name" value="{{$blog->image}}">
        
            <select class="form-control-select" name="categoryId">

                {{-- <option value="" selected="selected" disabled="disabled">Select Category</option> --}}
                <option value="{{$blog->category->id }}" selected disabled="disabled">{{ $blog->category->name }}</option>
                
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
       

            <select class="form-control-select" name="status">

                <option value="{{$blog->status}}" selected="selected" disabled="disabled">
                @if($blog->status == 1)
                    Public
                @else
                    Private

                @endif
                </option>
                
                    <option value="1" {{$blog->status == 1 ? 'selected' : ''}}>Public</option>
                    <option value="0" {{$blog->status == 0 ? 'selected' : ''}}>Private</option>
                
            </select>
        <button type="submit" class="btn">Create New Blog</button>
        </form>

    </div>

@endsection