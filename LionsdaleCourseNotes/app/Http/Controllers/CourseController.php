<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('Courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Course::class);

        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $this->authorize('create', Course::class);
        $course = Course::create($request->all());
        $course->save();

        return back()->with('message', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $this->authorize('view', Course::class);

        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $this->authorize('update', Course::class);

        return view('courses.edit',['course'=> $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('update', Course::class);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('message', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', Course::class);

        $course->delete();
        return back()->with('message', $course->name . ' was deleted Successfully');
    }

    public function show_deleted()
    {
        $this->authorize('restore', Course::class);

        $courses = Course::onlyTrashed()->get();
        return view('courses.show_deleted', ['course' => $courses]);
    }

    public function restore(Course $course)
    {
        $this->authorize('restore', Course::class);

        $course->restore();
        return back()->with('message', 'Event was restored successfully.');
    }
    public function myindex(Course $courses)
    {
        $this->authorize('restore', Course::class);

        return view('Courses.mycourses',['courses'=>$courses]);
    }
}
