<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        if($this->profile){
            return $this->profile->first_name." ".$this->profile->last_name;
        }
        return $this->username;
    }

    public function getAvatarAttribute()
	{
		if (!is_null($this->profile)) {
            return $this->profile->avatar;
        }
       return sprintf('https://www.gravatar.com/avatar/%s?s=100',md5($this->email));
	}

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        if($this->role_id === 3){
            return $this->hasOne(InstansiProfile::class);
        }
        return $this->hasOne(UserProfile::class);
    }

    public function sentLetters()
    {
        return $this->hasMany(Surat::class,'sender_id');
    }

    public function incomingLetters()
    {
        return $this->belongsToMany(Surat::class,'letter_reciver');
    }

    public function sentDisposisis()
    {
        return $this->hasMany(Disposisi::class, 'sender_id');
    }

    public function incomingDisposisis()
    {
        return $this->belongsToMany(Disposisi::class, 'disposisi_reciver');
    }
}
