<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();

        return view('backoffice.program.program', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.program.manage-program');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|file|mimes:jpeg,png,gif|max:2048', // Adjust max size as needed
        ];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        // Validate the form input (handled by StoreProgramRequest)

        // Create a new program instance
        $program = new Program();
        $program->title = $request->input('name');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail')) {
            $media = $program->addMediaFromRequest('thumbnail')
                ->toMediaCollection('program_thumbnails'); // Adjust the collection name

            // Save the filename in the database
            $program->thumbnail = $media->file_name;
        }

        // Save the program
        $program->save();

        // Redirect back or return a success response
        return redirect()->route('program.store')->with('success', 'Program added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::find($id);

        return view('backoffice.program.manage-program', ['program' => $program]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateProgramRequest $request, Program $program)
    {
        // Validate the form input (handled by UpdateProgramRequest)
        $program = Program::find($id); // Replace $programId with the actual ID of the program

        // Update the program title
        $program->title = $request->input('name');

        if ($request->hasFile('thumbnail')) {
            // Remove the old thumbnail (if it exists)
            if ($program->thumbnail) {
                $program->clearMediaCollection('program_thumbnails'); // Remove all old thumbnails
            }
        
            // Upload the new thumbnail
            $media = $program->addMediaFromRequest('thumbnail')
                ->toMediaCollection('program_thumbnails'); // Adjust the collection name
        
            // Save the filename in the database
            $program->thumbnail = $media->file_name;
        }
        

        // Save the program
        $program->save();

        // Redirect back or return a success response
        return redirect()->route('program')->with('success', 'Program updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return redirect()->route('program')->with('failed', 'An error has occured.');
        }

        // Delete the program
        $program->delete();

        // Redirect back or to a different page
        return redirect()->route('program')->with('success', 'Program deleted successfully!');
    }

}
