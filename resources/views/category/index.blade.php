@extends('layouts.egss')
@section('content')
@include('layouts.header')


@include('layouts.alerts')
    <div class="container">
        <h2>Create new Category</h2>
        <form action="{{route('create-category')}}" method="post" >
            @csrf
        <input type="text" name="name" id="" placeholder="Enter category name">
        <input type="text" name="slug" id="" placeholder="Enter the slug">
        
        <button type="submit" class="btn">Create New Category</button>
        </form>

    </div>

    <div class="container">
        <h2>All Categories</h2>

        @foreach ($categories as $category)
            <div class="card-category">
                <div class="card-body">
                    <h3 class="card-title">{{ $category->name }} <span class="slug">{{$category->slug}}</span></h5>
                    
                    <a href="{{ route('edit-category', $category->id) }}" class="link">Edit</a>
                    <a href="{{ route('delete-category', $category->id) }}" class="link">Delete</a>

                </div>
            </div>
            @endforeach
    </div>

@endsection