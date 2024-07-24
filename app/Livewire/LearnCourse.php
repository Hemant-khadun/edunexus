<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\CompletedCourse;
use App\Models\Courses;
use App\Models\QuizAnswers;
use App\Models\Quizzes;
use App\Models\StudentAnswers;
use Illuminate\Support\Facades\DB;


class LearnCourse extends Component
{
    public $courses;
    public $title;
    public $author;
    public $completed;
    public $isPdf;
    public $isGoodAnswer = false;
    public $showQuestionAccordion = '1';
    public $categories;

    public function mount ()
    {
        if($this->courses)
        {
            foreach($this->courses as $course){
                
                $userHasCompletedCourse = CompletedCourse::where('user_id', auth()->user()->id)
                    ->where('course_id', $course->id)
                    ->exists();
                if($userHasCompletedCourse){
                    $this->completed[$course->id] = 1;
                }

                if($course->media->isNotEmpty()){
                    $mimeType = $course->media->first()->mime_type; // Get the file path
                    $this->isPdf = ($mimeType === 'application/pdf');
                }
                
                if($course->material->title == 'Quiz'){

                $studentAnswers = DB::table('student_answers')
                    ->select('answer_id')
                    ->join('quiz_answers', 'student_answers.answer_id', '=', 'quiz_answers.id')
                    ->join('quizzes', 'quiz_answers.quiz_id', '=', 'quizzes.id')
                    ->join('courses', 'quizzes.course_id', '=', 'courses.id')
                    ->where('student_answers.user_id', auth()->user()->id)
                    ->get();

                    foreach($studentAnswers as $studentAnswer){
                        $this->isGoodAnswer[$studentAnswer->answer_id] = true;
                    }

                }

            }

            $this->courses = collect($this->courses)->groupBy('topic_id');

            $this->categories = Category::all();

        }
    }

    public function render()
    {
        return view('livewire.learn-course');
    }

    public function markAsComplete(String $id){

        CompletedCourse::firstOrCreate([
            'user_id' => auth()->user()->id,
            'course_id' => $id,
        ]);

        return $this->completed[$id] = 1;
    }

    public function saveAndValidateAnswer(Int $id, $courseId = '') : bool
    {
        $this->showQuestionAccordion = $courseId;
        $answer = QuizAnswers::find($id);
        $this->isGoodAnswer[$id] = $answer->is_good;

        if($this->isGoodAnswer[$id]){
            StudentAnswers::firstOrCreate([
                'user_id' => auth()->user()->id,
                'answer_id' => $id,
            ]);
        }


        $totalQuestions = Quizzes::where('course_id', $courseId)->count();

        $answedCount = DB::table('student_answers')
                        ->select('answer_id')
                        ->join('quiz_answers', 'student_answers.answer_id', '=', 'quiz_answers.id')
                        ->join('quizzes', 'quiz_answers.quiz_id', '=', 'quizzes.id')
                        ->join('courses', 'quizzes.course_id', '=', 'courses.id')
                        ->where('student_answers.user_id', auth()->user()->id)
                        ->where('courses.id', $courseId)
                        ->count();
                        
        if($totalQuestions == $answedCount){
            // mark as completed
            CompletedCourse::firstOrCreate([
                'user_id' => auth()->user()->id,
                'course_id' => $courseId,
            ]);
        }

        $isGoodAnswer[$id] = $this->isGoodAnswer[$id];

        return $isGoodAnswer[$id];
    }
}
