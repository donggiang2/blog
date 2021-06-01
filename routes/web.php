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

Route::get("/basicinsert",function(){
    // $post = Post::findorfail(1);
    // return $post;

    // $post->title = 'Demo 5';
    // $post->content = 'Demo content 5';
    Post::create(['title' => 'Demo 7','content'=>'Demo Content 7']);
    // $post = Post::where('id','>',3)->get();
    // return $post;
});

Route::get("/update",function(){
    $post = Post::where('id',2)->where('is_admin',0)->update(['title' =>'update title 3','content'=>'update content 3']);
    if($post == true){
        echo 'update ok';
    }else{
        echo 'update fail';
    }
});

Route::get("/delete",function(){
    // $post = Post::find(1);
    // $post->delete();

    $post= Post::destroy([4,6]);
    if($post == true){
        echo 'xoa thanh cong';
    }else{
        echo 'xoa that bai';
    }
});

Route::get("/softdelete",function(){
    $post = Post::find(7)->delete();
    if($post == true){
        echo "delete thanh cong";
    }else{
        echo "delete That bai";
    }
});

Route::get("/getDeleteItem",function(){
    // $post = Post::all();
    $post = Post::onlyTrashed()->get();
    print_r($post);
});

Route::get("/restore",function(){
    $post = Post::where("id",7)->restore();
    
});


//----------------------------------------------------------------------------------