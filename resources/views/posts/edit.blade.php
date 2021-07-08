@extends('layouts/app')
@section('content')
    <h3>Edit</h3>
    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="submit" name="submit" value="Submit">
    </form>

    <form method="post" action="{{route('posts.destroy',$post->id)}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete" name="btnDelete">
    </form>
@endsection