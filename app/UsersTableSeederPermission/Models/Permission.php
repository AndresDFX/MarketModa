<?php

namespace App\UsersTableSeederPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles(){
        return $this->belongsToMany('App\UsersTableSeederPermission\Models\Role')->withTimesTamps();
    }
}
