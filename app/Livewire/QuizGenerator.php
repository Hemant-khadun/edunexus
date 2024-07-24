<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quizzes;

class QuizGenerator extends Component
{
    public $course = null;
    public $course_id = null;
    public $questions = null;
    public $goodAnswers = [];

    public function mount($course = null)
    {
        if(isset($course)){
            $this->course_id = $course->id;
            $questions = Quizzes::where('course_id', $this->course_id)
                                ->with('quizAnswers')
                                ->orderBy('id','asc')
                                ->get();
                                
            foreach($questions as $indexQuestion => $question){
                $this->questions[] = [
                    'question' => $question->question, // New question text
                ];

                foreach($question->quizAnswers as $answerIndex => $answer){

                    $this->questions[$indexQuestion]['answers'][] = [
                        $answer->answer,
                    ];
                    
                    $this->questions[$indexQuestion]['is_good'][$answerIndex] = [
                        $answer->answer
                    ];

                    if($answer->is_good){
                        $this->goodAnswers[$indexQuestion][$answerIndex] = $answer->answer;
                    }

                    $this->goodAnswers[$indexQuestion]['good_answers'][$answerIndex] = $answer->answer;
                }
            }

        }else{
            $this->questions[] = [
                'text' => '', // New question text
                'answers' => [''], // New answer options
            ];
        }
    }

    public function addQuestion()
    {
        $this->questions[] = [
            'text' => '', // New question text
            'answers' => [''], // New answer options
        ];
    }

    public function addAnswer($questionIndex)
    {
        $this->questions[$questionIndex]['answers'][] = '';
    }

    public function removeAnswer($questionIndex, $answerIndex)
    {
        if (count($this->questions[$questionIndex]['answers']) > 1) {
            unset($this->questions[$questionIndex]['answers'][$answerIndex]);
            $this->questions[$questionIndex]['answers'] = array_values($this->questions[$questionIndex]['answers']);
        }
    }

    public function render()
    {
        return view('livewire.quiz-generator');
    }
}
