<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextContent extends Model
{
    use HasFactory;
    
    protected $table = 'text_contents';

    protected $fillable = [
        'content',
        'course_id'
    ];

}
