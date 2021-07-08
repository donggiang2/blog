<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return "hello index";
    }

    public function create(){
         return view('posts.create');
    }

    public function store(Request $request){
        //$post = Post::create($request->all());
        $input['title'] = $request->title;
        $post = Post::create($input);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

        return $post;
        //return $request->get('title');
        //return $request->title;
    }
}
