@extends('layouts.egss')
@section('content')
@include('layouts.header')


@include('layouts.alerts')
    <div class="blog-container">
        @foreach ($blogs as $blog)
        <div class="card">
            <img src="{{'https://source.unsplash.com/1600x800/?'. $blog->image}}" alt="">
            <h3>{{$blog->title}}</h3>
            <p>{{$blog->description}}</p>
            <div class="tag">{{$blog->category->name}}</div>

        </div>
        @endforeach
        
    </div>

@endsection