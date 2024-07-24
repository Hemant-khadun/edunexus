<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseWrapper extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'author_id'
    ];

    /**
     * Get the courses associated with the courseWrapper.
     */
    public function courses()
    {
        return $this->belongsTo(Courses::class, 'id');
    }

    /**
     * Get the author associated with the courseWrapper.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
