<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_status')->withPivot('user_id', 'created_at');
    }

    public function stusUpdatedBy($user_id)
    {
        return User::where('id', $user_id)->first()->user_name;
    }
}
