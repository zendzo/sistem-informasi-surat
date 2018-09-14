<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserProfile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'role_id',
        'birth_date',
        'gender_id',
    ];

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y',$value)->toDateString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
