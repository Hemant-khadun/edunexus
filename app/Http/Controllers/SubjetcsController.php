<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use App\Http\Requests\StoreSubjectsRequest;
use App\Http\Requests\UpdateSubjectsRequest;
use Illuminate\Support\Facades\Auth;

class SubjetcsController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user();
        $userRole = $currentUser->role;

        $currentUser = auth()->user();
        
        $subjects = Subjects::all();
        if($userRole == 'Student'){
            return view('backoffice.subject.student', compact('subjects'));
        }
        return view('backoffice.subject.subject', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.subject.manage-subject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectsRequest $request)
    {
        // Validate the form input (handled by StoreProgramRequest)

        // Create a new subject instance
        $subject = new Subjects();
        $subject->title = $request->input('title');
        $subject->description = $request->input('description');

        // Save the subject
        $subject->save();

        // Redirect back or return a success response
        return redirect()->route('subject.store')->with('success', 'Subject added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subjects::find($id);

        return view('backoffice.subject.manage-subject', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateSubjectsRequest $request, Subjects $subject)
    {
        // Validate the form input (handled by UpdateProgramRequest)
        $subject = Subjects::find($id); // Replace $subjectId with the actual ID of the subject

        // Update the subject title
        $subject->title = $request->input('title');
        $subject->description = $request->input('description');

        // Save the subject
        $subject->save();

        // Redirect back or return a success response
        return redirect()->route('subject')->with('success', 'Subject updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subjects::find($id);

        if (!$subject) {
            return redirect()->route('subject')->with('failed', 'An error has occured.');
        }

        // Delete the subject
        $subject->delete();

        // Redirect back or to a different page
        return redirect()->route('subject')->with('success', 'Subject deleted successfully!');
    }

}
