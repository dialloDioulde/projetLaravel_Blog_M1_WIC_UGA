<?php

namespace App\Http\Controllers;
use App\Comment;
use App\posts;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    //

    public function list(){
        $posts = posts::status();
        return view('welcome', ['p' => $posts]);

    }


    // show
    public function show($post_name) {
        $post = posts::where('post_name',$post_name)->first();

        $comment = Comment::all();

        return view('/posts/single', ['post' => $post, 'comments' => $comment]);
    }



}
