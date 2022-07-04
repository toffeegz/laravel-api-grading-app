<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use App\Models\User;

class Role extends LaratrustRole
{
    public $timestamps = true;

    protected $guarded = [];

    protected $fillable = [
        'name', 
        'display_name', 
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
