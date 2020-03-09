<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $guarded =[];
    // Posts-Users
    public function author()
    {
        return $this->belongsTo('App\User','user_id');

    }


    // Posts-Comment
    public function auhtorComment(){
        return $this->hasMany('App\Comment');
    }



    //
    public function scopeStatus($query){
        return $query->whereIn('id', [8,9,10])->get();
    }


}
