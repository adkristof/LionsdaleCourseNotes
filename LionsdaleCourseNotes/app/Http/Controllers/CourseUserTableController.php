<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUserTable;
use App\Http\Requests\StoreCourseUserTableRequest;
use App\Http\Requests\UpdateCourseUserTableRequest;

class CourseUserTableController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseUserTableRequest $request)
    {
        $this->authorize('view', Course::class);
        $courseuser = CourseUserTable::create($request->all());
        $courseuser->save();

        return redirect()->route('courses.index')->with('message', 'Successfully joined to a course.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseUserTable $courseuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseUserTable $courseuser)
    {
        $this->authorize('update', Course::class);

        return view('courseuser.edit',['courseuser'=> $courseuser]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseUserTableRequest $request, CourseUserTable $courseuser)
    {
        $this->authorize('update', Course::class);

        $courseuser->update($request->all());
        return redirect()->route('courses.index')->with('message', 'Successfully completed the course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseUserTable $courseuser)
    {
        //
    }
}
