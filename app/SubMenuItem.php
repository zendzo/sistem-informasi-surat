<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenuItem extends Model
{
    protected $fillable = ['name'];

    public function parentMenu()
    {
        return $this->belongsTo(MenuItem::class);
    }

    // looking for soultion for nested menu 
    // public function parentSubMenuItem()
    // {
    //     return $this->belongsTo(SubMenuItem::class, 'parent_id');
    // }

    // public function childSubMenuItems()
    // {
    //     return $this->hasMany(SubMenuItem::class, 'parent_id');
    // }
}
