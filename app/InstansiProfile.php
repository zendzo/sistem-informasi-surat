<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstansiProfile extends Model
{
    protected $fillable = [
        'instansi',
        'address',
        'phone',
        'user_id'
    ];
}
