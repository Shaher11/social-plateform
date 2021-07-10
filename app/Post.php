<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id', 'title', 'body', 'status', 'photo_id', 'recent', 'category_id'
    ];

    protected $appends = ['latest'];
    public function tags()
    {

        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    //    public function category(){
    //
    //        return $this->belongsTo(Category::class);
    //    }

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function photo()
    {

        return $this->belongsTo('App\Photo');
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function getLatestAttribute()
    {
        return 0;
    }


    public function qoute()
    {

        return $this->belongsTo(Post::class);
    }

}