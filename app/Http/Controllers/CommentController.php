<?php

namespace App\Http\Controllers;
use App\posts;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(){
        return view('posts/single');
    }


    //
    public function show(){

    }

    public function store(posts $post){
        Comment::create([
            'posts_id' => $post->id,
            'comment_name' => request('comment_name'),
            'comment_email' => request('comment_email'),
        ]);


        return back();
    }
}
