<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Http\Requests\StoreMaterialsRequest;
use App\Http\Requests\UpdateMaterialsRequest;

class MaterialsController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Materials::all();

        return view('backoffice.material.material', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.material.manage-material');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialsRequest $request)
    {
        // Validate the form input (handled by StoreProgramRequest)

        // Create a new program instance
        $material = new Materials();
        $material->title = $request->input('title');
        $material->description = $request->input('description');

        // Save the program
        $material->save();

        // Redirect back or return a success response
        return redirect()->route('material.store')->with('success', 'Subject added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materials $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $material = Materials::find($id);

        return view('backoffice.material.manage-material', ['material' => $material]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateMaterialsRequest $request, Materials $program)
    {
        // Validate the form input (handled by UpdateProgramRequest)
        $material = Materials::find($id); // Replace $programId with the actual ID of the program

        // Update the program title
        $material->title = $request->input('title');
        $material->description = $request->input('description');

        // Save the program
        $material->save();

        // Redirect back or return a success response
        return redirect()->route('material')->with('success', 'Program updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $material = Materials::find($id);

        if (!$material) {
            return redirect()->route('material')->with('failed', 'An error has occured.');
        }

        // Delete the program
        $material->delete();

        // Redirect back or to a different page
        return redirect()->route('material')->with('success', 'Subject deleted successfully!');
    }

}
