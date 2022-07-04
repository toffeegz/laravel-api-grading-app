<?php

namespace App\Models;
use App\Models\Role;

use Laratrust\Models\LaratrustPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends LaratrustPermission
{
    use HasFactory;

    public $guarded = [];

    protected $fillable = [
        'name', 
        'display_name', 
        'description',
    ];

    public function roles()
    {
        return $this->belongToMany(Role::class);
    }
}
