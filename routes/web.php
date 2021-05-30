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
//--------------------------RAW SQL------------------------------------------------
Route::get('/insert',function(){
    DB::insert('insert into posts(title,content) value (?,?)', ['tieu de 1','noi dung dong Thu 1']);   
});

// Route::get("/read",function(){
//     $results = DB::select("select * from posts");
//     // print_r($results->title);
//     foreach($results as $post){
//         echo $post->title;
//         echo '<p>' . $post->content.'</p>';
//     }
// });

// Route::get('/update',function(){
//     $result = DB::update('update posts set title = "title update 1" Where id = ?',[1]);
//     return $result;
// });

// Route::get("/delete",function(){
//     $deleted = DB::delete('delete from posts where id=?',[1]);
//     return $deleted;
// });

//--------------------------------------------------------------------------------------

//-------------------ELOQUENT-------------------------------------------------------
use App\Post;

Route::get("/read",function(){
    $posts = Post::all();
    foreach($posts as $post){
        echo $post->title;
    }
});

Route::get("/find",function(){
    $posts = Post::find(3);
    return $posts->title;
    // foreach($posts as $post){
    //     echo $post->title;
    // }
});

Route::get("/findwhere",function(){
    $posts = Post::where('title','like','%tieu de%')->orderBy('id','desc')->get();
    return $posts;
});

// Route::get("/findmore",function(){
//     //$post = Post::findorfail(1);

//     if($post = Post::findorfail(4))){
//         echo 'Không có đối tượng này';
//     }else{
//         print_r($post);
//     }
//     die;
//     return $post;
// });

Route::get("/updatenew",function(){
    $post = Post::find(2);
    if(empty($post)){
        echo 'No Item';
    }else{
        $post->title = 'Update 2';
        $post->content = "update content 2";
        $post->save();
        return "update success";
    }
    
});

Route::get("/create",function(){
    
    $post = Post::create(['title' => 'create new blog 5','content'=>'create content 5']);
    if($post == true){
        echo 'create thanh cong';
    }else{
        echo 'create that bai';
    }
});

Route::get("/update",function(){
    
    $post = Post::where('id',5)->where('is_admin',0)->update(['title' => 'update new blog 4 ','content'=>'update content 4']);
    if($post == true){
        echo 'update thanh cong';
    }else{
        echo 'update that bai';
    }
});




//----------------------------------------------------------------------------------