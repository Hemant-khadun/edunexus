<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_id',
        'subject_id',
        'course_id',
        'author_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function course()
    {
        return $this->belongsTo(CourseWrapper::class, 'course_id');
    }
}
