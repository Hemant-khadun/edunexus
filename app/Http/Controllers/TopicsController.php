<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Program;
use App\Http\Requests\StoretopicRequest;
use App\Http\Requests\UpdatetopicRequest;
use App\Models\CourseWrapper;
use App\Models\Subjects;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $topics = Topic::select('*');

        // Check if the user has the role of "Tutor"
        if ($user->role_id === 2) {
           $topics->where('author_id', $user->id);
        }

        $topics->get();

        return view('backoffice.topic.topic', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Program::all();
        $subjects = Subjects::all();
        $courses = CourseWrapper::where('author_id', auth()->user()->id)->get();
        
        return view('backoffice.topic.manage-topic', compact('grades', 'subjects', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretopicRequest $request)
    {
      // Create a new subject instance
      $topic = new Topic();
      $topic->name = $request->input('name');
      $topic->program_id = $request->input('grade');
      $topic->subject_id = $request->input('subject');
      $topic->course_id = $request->input('course');

      $topic->author_id = auth()->user()->id;

      // Save the subject
      $topic->save();

      // Redirect back or return a success response
      return redirect()->route('topic.store')->with('success', 'Topic added successfully!');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(topic $topic, Int $id)
    {
        $topic = Topic::find($id);
        $grades = Program::all();
        $subjects = Subjects::all();
        $courses = CourseWrapper::where('author_id', auth()->user()->id)->get();

        return view('backoffice.topic.manage-topic', ['topic' => $topic, 'grades' => $grades, 'subjects' => $subjects, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetopicRequest $request, topic $topic, Int $id)
    {
         // Validate the form input (handled by UpdateProgramRequest)
         $topic = Topic::find($id);

         // Update the subject title
        $topic->name = $request->input('name');
        $topic->program_id = $request->input('grade');
        $topic->subject_id = $request->input('subject');
        $topic->course_id = $request->input('course');
 
         // Save the subject
         $topic->save();
 
         // Redirect back or return a success response
         return redirect()->route('topic')->with('success', 'Topic updated successfully!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(topic $topic, Int $id)
    {
        $topics = Topic::find($id);

        if (!$topics) {
            return redirect()->route('topic')->with('failed', 'An error has occured.');
        }

        // Delete the subject
        $topics->delete();

        // Redirect back or to a different page
        return redirect()->route('topic')->with('success', 'Topic deleted successfully!');
    }
}
