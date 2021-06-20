@extends('layouts/app')
@section('content')

    <form method="post" action="/posts">
        @csrf
        <input type="text" placeholder="enter title" name="title">
        <input type="submit" value="Save" name="submit">
    </form>

@endsection

@yield('footer')