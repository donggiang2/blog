
@extends('layout.app')
@section('content')
    <form method="post" action="/posts">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit" value="Submit">
    </form>



@yield('footer')