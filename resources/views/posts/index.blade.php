@extends('layouts/app')
@section('content')
    <ul>
        @foreach ($posts as $post)
            
            <li><a href="{{route('posts.show',$post->id)}}">{{$post->title}} | <a href="{{route('posts.edit',$post->id)}}">Edit</a>|<a href="{{route('delete2',$post->id)}}">Delete</a></li>
        @endforeach
    </ul><a href="/posts/create">Thêm mới</a>
@endsection


@yield('footer')