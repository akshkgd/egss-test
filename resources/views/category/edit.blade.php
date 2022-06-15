

@extends('layouts.egss')
@section('content')
@include('layouts.header')



<div class="container">
    <h2>Edit {{$category->name}} Category</h2>
    <form action="{{route('update-category')}}" method="post">
        @csrf
    <input type="text" name="name" id="" placeholder="Enter category name" value="{{$category->name}}">
    <input type="text" name="slug" id="" placeholder="Enter the slug" value="{{$category->slug}}">
    <input type="hidden" name="categoryId" id="" value="{{$category->id}}">
    <button type="submit" class="btn">Update Category</button>
    </form>

</div>


@endsection