@extends('layouts/app')
@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{ $post->content}}</p>

    <a href="{{route('posts.index')}}">Trở lại </a>
@endsection