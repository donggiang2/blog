<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){
    DB::insert('insert into posts(title,content) value (?,?)', ['tieu de 2','noi dung dong Thu 2']);   
});

Route::get("/read",function(){
    $results = DB::select("select * from posts");
    // print_r($results->title);
    foreach($results as $post){
        echo $post->title;
        echo '<p>' . $post->content.'</p>';
    }
});

Route::get('/update',function(){
    $result = DB::update('update posts set title = "title update 1" Where id = ?',[1]);
    return $result;
});