<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\OrderStatus;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'user_name', 'role_id', 'status', 'photo_id', 'phone', 'email',
        'password', 'provider', 'provider_id', 'access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar'];
    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = ucfirst($value);
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }


    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin()
    {
        if ($this->role->name  == "Admin" && $this->status == 1) {

            return true;
        }

        return false;
    }
    
    public function isClient()
    {
        if ($this->role->name  == "Client" || $this->role->name == "Developer" && $this->status == 1) {

            return true;
        }

        return false;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function getAvatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm&s=";
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function client_rooms()
    {
        return $this->hasMany('App\Room', 'client_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function canJoinRoom($roomId)
    {
        return true;
    }

    public function client_testmonials()
    {
        return $this->hasMany(ClientTestimonial::class);
    }

    public function codes()
    {
        return $this->belongsToMany('App\Code', 'code_user');
    }
}
