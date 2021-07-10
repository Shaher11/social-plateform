<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'post_id','author','body','status','email','photo_id'
    ];


    public function post(){

        return $this->belongsTo(Post::class);
    }

    public function replies(){

        return $this->hasMany(CommentReply::class);
    }


    public function photo(){

        return $this->belongsTo(Photo::class);
    }

}
