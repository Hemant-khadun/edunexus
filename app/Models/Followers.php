<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'course_id',
        'follower_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'follower_id');
    }

    public function course()
    {
        return $this->belongsTo(CourseWrapper::class , 'course_id');
    }

}
