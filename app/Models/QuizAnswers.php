<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswers extends Model
{
    use HasFactory;

    protected $table = 'quiz_answers';
    
    protected $fillable = [
        'quiz_id',
        'answer',
        'is_good'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quizzes::class);
    }
}
