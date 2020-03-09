<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    //
    public function authorPost(){
        return $this->belongsTo('App\posts','posts_id');
    }

    public function showComment(){
        $comment = Comment::all();

        return view('posts/single', ['comments' => $comment]);
    }

}
