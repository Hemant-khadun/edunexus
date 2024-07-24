<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchCourses extends Component
{
    public $search = '';
    public $id;

    public function render()
    {

        $currentUser = Auth::user();
        $userRole = $currentUser->role;
        
        $currentId = Auth::user()->id;

        $coursesQuery = Courses::with(['material:id,title', 'program:id,title', 'subject:id,title'])->where('wrapper_id',$this->id);
        
        if ($userRole == 'Tutor') {
            $coursesQuery->where('author_id', $currentId);
        }else if ($userRole == 'Student') {
            $coursesQuery->where('program_id', $currentUser->grade);
            // $tutorIds = DB::table('followers')
            //                 ->where('follower_id', $currentUser->id)
            //                 ->where('status', '1')
            //                 ->pluck('user_id');
            // $coursesQuery->whereIn('author_id', $tutorIds);
            
            
        }

        if($this->search != '') {
            $coursesQuery->where('course_name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        $courses = $coursesQuery->orderBy('topic_id', 'asc');

        $courses = $coursesQuery->get();
       
        return view('livewire.search-courses',  ['courses' => $courses]);
    }

    public $colors = [];
    public $topics;

    public function mount()
    {
        $this->topics = Topic::all(); 
        foreach ($this->topics as $topic) {
            $this->colors[$topic->name] = $this->getColorForTopic($topic->name);
        }
    }

    private function generateColorClass()
    {
        $colors = ['red', 'green', 'blue', 'yellow', 'indigo', 'pink'];
        $randomColor = $colors[array_rand($colors)];
        $generatedColor = "text-$randomColor-400";

        return $generatedColor;
    }

    function getColorForTopic($topicName) {
        global $colors;

        if (isset($colors[$topicName])) {
            // Return the stored color
            return $colors[$topicName];
        } else {
            // Generate a new color and store it
            $color = $this->generateColorClass();
            $colors[$topicName] = $color;
            return $color;
        }
    }
}
