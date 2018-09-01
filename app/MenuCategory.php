<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = ['name'];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
