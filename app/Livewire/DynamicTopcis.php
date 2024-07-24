<?php

namespace App\Livewire;

use App\Models\Topic;
use Livewire\Component;

class DynamicTopcis extends Component
{
    public $grades;
    public $topic;
    public $subjects;
    public $courses;
    public $preselectDetails;
    public $selectedCourse;

    public function mount(){
        if(isset($this->topic)){
           $this->selectedCourse = $this->topic->course_id;
        }
    }

    public function render()
    {
        
        if($this->selectedCourse){
            $existingTopics = Topic::where('course_id', $this->selectedCourse)->get();
            if(!$existingTopics->isEmpty()){
                $this->preselectDetails['subject']['id'] = $existingTopics->first()->subject->id;
                $this->preselectDetails['subject']['title'] = $existingTopics->first()->subject->title;
                $this->preselectDetails['grade']['id'] = $existingTopics->first()->program->id;
                $this->preselectDetails['grade']['title'] = $existingTopics->first()->program->title;
            }else{
                $this->preselectDetails = [];
            }
        }

        return view('livewire.dynamic-topcis');
    }
}
