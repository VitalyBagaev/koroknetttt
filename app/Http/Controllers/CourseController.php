<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function courseadd(StoreCourseRequest $request)
    {
        $course = new Course;
        $course->user_id = Auth::user()->id;
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->photo = 'storage/photos/'.Storage::disk('photos')->putFile($request->file('photo'));
        $course->save();

        return redirect()->route('admincourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function courseform()
    {

        return view('courseadd');

    }

    /**
     * Display the specified resource.
     */
    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->route('admincourse');

    }

    public function courseeditform(Course $course)
    {
        return view('courseadd', compact('course'));

    }

    public function courseedit(UpdateCourseRequest $request, Course $course)
    {
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        if ($request->file('photo')) {
            $course->photo = 'storage/photos/'.Storage::disk('photos')->putFile($request->file('photo'));
        }
        $course->save();

        return redirect()->route('admincourse', [$course->id]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
