<?php

namespace App\Livewire;

use App\Models\CourseWrapper;
use App\Models\Courses;
use App\Models\Subjects;
use App\Models\Topic;
use Livewire\Component;

class SelectTopics extends Component
{
    public $grades;
    public $topics;
    public $selectedGrade;
    public $selectedTopic;
    public $selectedSubject;
    public $course;
    public $subjects;
    public $courseWrapper;
    public $existingTopics = false;

    public function mount()
    {
        $topics = [];

        $this->topics = $topics;
        $this->subjects = $topics;
        
        $existingTopics = Topic::where('course_id', request()->route('id'))->get();
        
        if(!$existingTopics->isEmpty()){

            $this->existingTopics = true;

            foreach($existingTopics as $index => $topic){
                $this->topics[$index]['id'] = $topic->id;
                $this->topics[$index]['name'] = $topic->name;
                $this->subjects[0]['id'] = $topic->subject->id;
                $this->subjects[0]['title'] = $topic->subject->title;
                $this->selectedGrade = $topic->program_id;
                $this->selectedSubject = $topic->subject_id;
            }

        }


        $this->courseWrapper = Courses::select('program_id', 'subject_id', 'author_id')
        ->where('wrapper_id', request()->route('id'))
        ->first();

        if(isset($this->course)){
            $this->selectedGrade = $this->course->program_id;
            $this->selectedTopic = $this->course->topic_id;
            $this->selectedSubject = $this->course->subject_id;
        }

        if(isset($this->courseWrapper)){
            $this->subjects = [];
            $this->subjects[0]['id'] = $this->courseWrapper->subject->id;
            $this->subjects[0]['title'] = $this->courseWrapper->subject->title;
            $this->subjects = (object) $this->subjects;
            $this->selectedGrade = $this->courseWrapper->program->id;
        }
        
    }

    public function render()
    {
        if($this->selectedGrade){
            $query = Topic::query();

            if(isset($this->courseWrapper)){

                $query->where('subject_id',$this->courseWrapper->subject->id);
                $query->where('author_id',$this->courseWrapper->author->id);

            }else{

                if($this->selectedSubject){
                    $query->where('subject_id',$this->selectedSubject);
                }
                    $query->where('author_id',auth()->user()->id);

            }
                
                $query->where('program_id', $this->selectedGrade);
                $query->where('course_id', request()->route('id'));
            $this->topics = $query->get();
        }
        
        if($this->selectedTopic && !isset($this->courseWrapper)){
            // $this->subjects = Topic::where('id', $this->selectedTopic)->with('subject:id,title')->get();
        }

        return view('livewire.select-topics');
    }
}
