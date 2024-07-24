<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return view('backoffice.category.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.category.manage-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // Create a new category instance
        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        // Save the category
        $category->save();

        // Redirect back or return a success response
        return redirect()->route('category.store')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Int $id, Category $category)
    {
        $category = Category::find($id);

        return view('backoffice.category.manage-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Int $id, UpdateCategoryRequest $request, Category $category)
    {
        // Validate the form input (handled by UpdateProgramRequest)
        $category = Category::find($id); // Replace $category with the actual ID of the category

        // Update the category title
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        // Save the category
        $category->save();

        // Redirect back or return a success response
        return redirect()->route('category')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id, Category $category)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category')->with('failed', 'An error has occured.');
        }

        // Delete the category
        $category->delete();

        // Redirect back or to a different page
        return redirect()->route('category')->with('success', 'Category deleted successfully!');
    }
}
