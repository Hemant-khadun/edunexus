<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Materials;

class CourseForm extends Component
{
    public $search = '';
    public $selectedMaterial = '';
    public $course = null;

    public function mount($course = null)
    {
        $this->course = $course;
        if(isset($course)){
            $this->selectedMaterial = $course->material->title;
        }
    }

    public function render()
    {
        $courses = Courses::where('course_name', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->get();

        $materials = Materials::where('title', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->get();

        return view('livewire.course-form', ['courses' => $courses, 'materials' => $materials, 'selectedMaterial', $this->selectedMaterial]);
    }

}
