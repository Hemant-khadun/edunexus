<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Courses extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'id',
        'course_name',
        'description',
        'author_id',
        'subject_id',
        'material_id',
        'program_id',
        'wrapper_id',
        'category_id'
    ];

    /**
     * Get the material associated with the course.
     */
    public function material()
    {
        return $this->belongsTo(Materials::class);
    }

    /**
     * Get the subject associated with the course.
     */
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    /**
     * Get the program associated with the course.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function textContent()
    {
        return $this->hasOne(TextContent::class, 'course_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function quiz()
    {
        return $this->hasMany(Quizzes::class, 'course_id');
    }

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function courseWrapper()
    {
        return $this->belongsTo(courseWrapper::class, 'wrapper_id');
    }

    public function relatedCourses()
    {
        return $this->hasMany(self::class, 'topic_id', 'topic_id')
            ->where('author_id', $this->author_id)
            ->where('id', '<>', $this->id);
    }

     /**
     * Get the category associated with the course.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
