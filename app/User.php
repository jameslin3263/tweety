<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'username', 'name', 'email', 'password',
    // ];
    protected $guarded = [];

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

    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/200?u=" . $this->email;
        // dd($value);
        // echo $value;
        // return asset($value);
        // return '/avatars' . $this->avatar;
    }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        // return Tweet::whereIn('user_id', $ids)->orderby('created_at', 'desc')->get();
        return Tweet::whereIn('user_id', $ids)->latest()->get();

        // $friends = $this->follows()->plunk('id');

        // return Tweet::whereIn('user_id', $friends)
        //     ->orWhere('user_id', $this->id)
        //     ->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function path($append = '')
    {
        $path = route('profile', $this->name);
        return $append ? "{$path}/{$append}" : $path;
    }
}
