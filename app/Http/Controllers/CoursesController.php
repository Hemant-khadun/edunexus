<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Program;
use App\Models\Subjects;
use App\Models\Materials;
use App\Models\TextContent;
use App\Models\Quizzes;
use App\Models\QuizAnswers;
use App\Models\Category;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Models\CourseWrapper;
use GuzzleHttp\Promise\Coroutine;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Int $id)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user has the role of "Tutor"
        if ($user->role_id === 2) {
            // Only fetch courses related to the tutor
            $courses = Courses::where('author_id', $user->id)
                ->where('wrapper_id', $id)
                ->with(['material:id,title', 'program:id,title', 'subject:id,title'])
                ->get();
        } else {
            // Fetch all courses (for other roles)
            $courses = Courses::with(['material:id,title', 'program:id,title', 'subject:id,title'])
            ->get();
        }

        return view('backoffice.learning.learning', compact('courses', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Program::all();
        $subjects = Subjects::all();
        $materials = Materials::all();
        $categories = Category::all();
        
        return view('backoffice.learning.manage-content', compact('grades', 'subjects', 'materials', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursesRequest $request)
    {
        try {

            DB::beginTransaction();

            $course = new Courses();
            $course->course_name = $request->input('title');
            $course->description = $request->input('description');
            $course->wrapper_id = $request->input('wrapper-id');
            $course->program_id = (int)trim($request->input('grade'));
            $course->subject_id = (int)trim($request->input('subject'));
            $course->topic_id = (int)trim($request->input('topic'));
            $course->category_id = (int)trim($request->input('category'));

            $course->author_id = auth()->user()->id;
            
            $material = Materials::where('title', $request->input('material'))->first();
            $course->material_id = $material->id;
            // Save the course

            $course->save();

            
            // If material is text, save it to text_contents
            if ($request->input('material') === 'Text') {
                $textContent = new TextContent();
                $textContent->course_id = $course->id;
                $textContent->content = $request->input('course_text');
                
                $textContent->save();
            }

            if ($request->input('material') === 'Video') {
                $course->addMedia($request->file('video'))->toMediaCollection('videos');
            } elseif ($request->input('material') === 'File') {
                $course->addMedia($request->file('file'))->toMediaCollection('files');
            }

            if ($request->input('material') === 'Quiz') {
                foreach ($request->input('quiz_questions') as $questionIndex => $questionText) {

                    $quiz = new Quizzes();
                    $quiz->course_id = $course->id;
                    $quiz->question = $questionText;

                    $quiz->save();

                    $allAnswers = $request->input('quiz_answers');
                    $allGoodAnswers = $request->input('good_answer');
                    // Save the quiz answers
                    foreach ( $allAnswers[$questionIndex] as $answerText) {
                        $answer = new QuizAnswers();
                        $answer->quiz_id = $quiz->id;
                        $answer->answer = $answerText;
                        if($answerText == $allGoodAnswers[$questionIndex]){
                            $answer->is_good = 1;
                        }else{
                            $answer->is_good = 0;
                        }
                        $answer->save();
                    }
                }
            }

            DB::commit();

            // Redirect to a success page or wherever you need
            return redirect('learning/content/'.$request->input('wrapper-id'))->with('success', 'Course created successfully!');
        } catch (\Exception $e) {

            DB::rollBack();
            // Log the error or handle it as needed
            return redirect()->back()->with('failed', 'An error occurred while creating the course.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grades = Program::all();
        $subjects = Subjects::all();
        $materials = Materials::all();
        $course = Courses::find($id);
        $categories = Category::all();
        
        return view('backoffice.learning.manage-content', compact('grades', 'subjects', 'materials', 'course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateCoursesRequest $request)
    {
        try {
            DB::beginTransaction();

            // Find the existing course by ID
            $course = Courses::findOrFail($id);

            // Update course properties
            $course->course_name = $request->input('title');
            $course->program_id = (int)trim($request->input('grade'));
            $course->subject_id = (int)trim($request->input('subject'));
            $course->description = $request->input('description');
            $course->topic_id = (int)trim($request->input('topic'));
            $course->category_id = (int)trim($request->input('category'));

            // Update material (if applicable)
            $material = Materials::where('title', $request->input('material'))->first();
            $course->material_id = $material->id;

            // Save the updated course
            $course->save();

           // If material is text, save it to text_contents
           if ($request->input('material') === 'Text') {
                // Check if a text content already exists for this course
                $existingTextContent = TextContent::where('course_id', $course->id)->first();
            
                if ($existingTextContent) {
                    // Update the existing text content
                    $existingTextContent->content = $request->input('course_text');
                    $existingTextContent->save();
                } else {
                    // Create a new text content
                    $textContent = new TextContent();
                    $textContent->course_id = $course->id;
                    $textContent->content = $request->input('course_text');
                    $textContent->save();
                }
            }

            if ($request->input('material') === 'Video') {
                if ($request->file('video')) {
                    $course->clearMediaCollection('videos');
                    $course->addMedia($request->file('video'))->toMediaCollection('videos');
                }
            } elseif ($request->input('material') === 'File') {
                if ($request->file('file')) {
                    $course->clearMediaCollection('files');
                    $course->addMedia($request->file('file'))->toMediaCollection('files');
                }
            }
        
            if ($request->input('material') === 'Quiz') {

                foreach ($request->input('quiz_questions') as $questionindex => $questionText) {

                    $existingQuiz = Quizzes::where(['course_id' => $course->id, 'question' => $questionText])
                        ->first();

                    if ($existingQuiz) {
                        $existingQuiz->update(['question' => $questionText]);
                    } else {
                       $existingQuiz = Quizzes::create(['course_id' => $course->id, 'question' => $questionText]);
                    }

                    $answers = $request->input('quiz_answers');
                    $allGoodAnswers = $request->input('good_answer');
                    $existingAnswerIds = $existingQuiz->quizAnswers()->pluck('id')->toArray();
                    
                    foreach ($answers[$questionindex] as $answerIndex => $answerText) {
                       
                        if($answerIndex == $allGoodAnswers[$questionindex]){
                            $isGood = 1;
                        }else{
                            $isGood = 0;
                        }

                        $existingAnswer = QuizAnswers::where('quiz_id', $existingQuiz->id)
                            ->where('answer', $answerText)
                            ->where('is_good', $isGood)
                            ->first();

                        if ($existingAnswer) {
                           
                            $existingAnswer->update(['answer' => $answerText, 'is_good' => $isGood ]);
                            $existingAnswerIds = array_diff($existingAnswerIds, [$existingAnswer->id]);

                        } else {

                            QuizAnswers::create(['quiz_id' => $existingQuiz->id, 'answer' => $answerText , 'is_good' => $isGood]);
                        }

                    }

                    QuizAnswers::whereIn('id', $existingAnswerIds)->delete();

                }
                
            }

            DB::commit();

            // Redirect to a success page or wherever you need
            return redirect()->route('learning')->with('success', 'Course updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error or handle it as needed
            return redirect()->back()->with('failed', 'An error occurred while updating the course.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        try {
        // Find the course by its ID
        $courseToDelete = Courses::findOrFail($id);

        // Add any additional logic (e.g., authorization checks) here
        $courseToDelete->quiz()->delete();


        // Delete the course
        $courseToDelete->delete();

        // Redirect or return a response as needed
        return redirect()->route('learning')->with('success', 'Course has been deleted successfully!');
        } catch (\Exception $e) {
            // Handle the integrity constraint violation (e.g., show an error message)
            return redirect()->route('learning')->with('failed', 'Could not delete the course.');

        }

    }

    public function learn (Int $courseId)
    {
        $courseWrapper = CourseWrapper::find($courseId);
        $currentCourses = [];
        $wrapperId = $courseWrapper->id;
        $courseName = $courseWrapper->title;
        $authorName = $courseWrapper->author->name;

        $courses = Courses::where('wrapper_id', $wrapperId)->orderBy('topic_id')->get();

        return view('backoffice.learning.student', compact('courses', 'courseName', 'authorName'));
    }
}
