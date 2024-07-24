<?php

namespace App\Http\Controllers;

use App\Models\CourseWrapper;
use App\Http\Requests\StoreCourseWrapperRequest;
use App\Http\Requests\UpdateCourseWrapperRequest;

class CourseWrapperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Get the authenticated user
       $user = auth()->user();

       // Check if the user has the role of "Tutor"
       if ($user->role_id === 2) {
           // Only fetch courses related to the tutor
            $courses = CourseWrapper::get('author_id', $user->id)->get();
       } else {
            $courses = CourseWrapper::get();
       }
     
       return view('backoffice.learning.courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.learning.manage-course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseWrapperRequest $request)
    {
        // Create a new subject instance
        $courseWrapper = new CourseWrapper();
        $courseWrapper->title = $request->input('title');
        $courseWrapper->description = $request->input('description');
        $courseWrapper->author_id = auth()->user()->id;

        // Save the subject
        $courseWrapper->save();

        // Redirect back or return a success response
        return redirect()->route('course.store')->with('success', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseWrapper $courseWrapper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Int $id, CourseWrapper $courseWrapper)
    {
        $course = CourseWrapper::find($id);

        return view('backoffice.learning.manage-course', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Int $id, UpdateCourseWrapperRequest $request, CourseWrapper $courseWrapper)
    {
        // Validate the form input (handled by UpdateProgramRequest)
        $courseWrapper = CourseWrapper::find($id); // Replace $subjectId with the actual ID of the subject

        // Update the subject title
        $courseWrapper->title = $request->input('title');
        $courseWrapper->description = $request->input('description');

        // Save the subject
        $courseWrapper->save();

        // Redirect back or return a success response
        return redirect()->route('course.edit', $id)->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id, CourseWrapper $courseWrapper)
    {
        $courseWrapper = CourseWrapper::find($id);

        if (!$courseWrapper) {
            return redirect()->route('subject')->with('failed', 'An error has occured.');
        }

        // Delete the subject
        $courseWrapper->delete();

        // Redirect back or to a different page
        return redirect()->route('learning')->with('success', 'Course deleted successfully!');
    }
}
