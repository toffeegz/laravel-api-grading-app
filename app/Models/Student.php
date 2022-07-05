<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'course_id',
        'year_level',
        'section',
        'is_regular',
    ];

    public function user()
    {
        return $this->belongsto(User::class, 'user_id');
    }
}
