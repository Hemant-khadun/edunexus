<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'question'
    ];

    public function quizAnswers()
    {
        return $this->hasMany(QuizAnswers::class, 'quiz_id');
    }

    public function quizQuestions()
    {
        return $this->belongsToMany(Courses::class);
    }
}
