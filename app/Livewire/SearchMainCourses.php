<?php

namespace App\Livewire;

use App\Models\CourseWrapper;
use App\Models\Courses;
use App\Models\Followers;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchMainCourses extends Component
{
    public $search = '';

    public function render()
    {

        $currentUser = Auth::user();
        $userRole = $currentUser->role;
        
        $currentId = Auth::user()->id;

        $coursesWrapperQuery = CourseWrapper::select('*');
        if ($userRole == 'Tutor') {
            $coursesWrapperQuery->where('author_id', $currentId);
        }else if ($userRole == 'Student') {
            $courseIds = Followers::
                            where('follower_id', $currentUser->id)
                            ->where('status', '1')
                            ->pluck('course_id');

            if(!$courseIds->isEmpty()){
                $coursesWrapperQuery->orderByRaw('
                        CASE
                            WHEN id IN (' . implode(',', $courseIds->toArray()) . ') THEN 0
                            ELSE 1
                        END,
                        id
                    ');
            }

            $subjectId = $currentUser->subject;
            $coursesQuery = Courses::select('wrapper_id')
            ->where('subject_id', $subjectId)
            ->groupBy('wrapper_id')
            ->get();

            $coursesWrapperQuery->whereIn('id', $coursesQuery);

        }

        if($this->search != '') {
            $coursesWrapperQuery->where('title', 'like', '%' . $this->search . '%');
        }

        // DB::enableQueryLog(); // Enable query log
        $courses = $coursesWrapperQuery->get();
        // dd(DB::getQueryLog()); // Show results of log

        if($userRole == 'Student'){
            return view('livewire.search-courses-student',  ['courses' => $courses]);
        }
        return view('livewire.search-main-courses', ['courses' => $courses]);
    }
}
