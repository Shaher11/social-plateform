<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id','author','body','photo_id','status','email'
    ];

    public function comment(){

        return $this->belongsTo(Comment::class);
    }

    public function photo(){

        return $this->belongsTo(Photo::class);
    }

}
