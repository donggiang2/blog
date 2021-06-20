@extends('layouts/app')
@section('content')
    <ul>
    @foreach ($posts as $item)
        <li>{{$item->id}} || {{$item->title}}</li>
    @endforeach
    </ul>
@endsection

@yield('footer')