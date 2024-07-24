<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedCourse;
use App\Models\Courses;
use App\Models\CourseWrapper;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class AchivementsController extends Controller
{
    public function index()
    {
  
        $completedCourseName = [];
        $completedCourses = CompletedCourse::where('user_id', auth()->user()->id)->get();
        $courseWrapper = $completedCourses->pluck('course.wrapper_id');

        $userCompletedCourse = [];

        foreach ($courseWrapper->all() as $courseId) {
            // Convert the value to a string to handle mixed data types
            $stringValue = (string)$courseId;
        
            // Increment the count for this value
            if (isset($userCompletedCourse[$stringValue])) {
                $userCompletedCourse[$stringValue]++;
            } else {
                $userCompletedCourse[$stringValue] = 1;
            }
        }

        
        $completedWrappers = array_unique($courseWrapper->all());
        $completedWrappersCount = 0;
        $completedWrappersTitles = [];
        $courseContentCount = [];

        foreach($completedWrappers as $wrapperId){
            if($wrapperId != ''){
                $courseTitle = CourseWrapper::select('title','author_id')->where('id', $wrapperId)->limit(1)->get();
                $courseContentCount[$wrapperId] = Courses::select('id')->where('wrapper_id', $wrapperId)->count();
                if($courseContentCount[$wrapperId] == $userCompletedCourse[$wrapperId]){
                    $completedWrappersTitles[] = $courseTitle[0]->title. ' By ' . $courseTitle[0]->author->name;
                }
                ++$completedWrappersCount;
            }
        }

        $completedCourseName = $completedWrappersTitles;

        return view('backoffice.progress.acheivements', compact('completedCourseName'));
    }
}
