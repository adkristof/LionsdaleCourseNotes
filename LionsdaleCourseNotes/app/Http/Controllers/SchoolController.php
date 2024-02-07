<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        
        return view('schools.index',['schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Course::class);

        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        $this->authorize('create', Course::class);
        $school = School::create($request->all());
        $school->save();

        return back()->with('message', 'School created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        $this->authorize('view', Course::class);

        return view('schools.show', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $this->authorize('update', Course::class);

        return view('schools.edit',['school'=> $school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $this->authorize('update', Course::class); 
        $school->update($request->all());
        return redirect()->route('schools.index')->with('message', 'School Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $this->authorize('delete', Course::class);

        $school->delete();
        return back()->with('message', $school->name . ' was deleted Successfully');
    }
    public function show_deleted()
    {
        $this->authorize('restore', Course::class);

        $schools = School::onlyTrashed()->get();
        return view('schools.show_deleted', ['school' => $schools]);
    }

    public function restore(School $school)
    {
        $this->authorize('restore', Course::class);

        $school->restore();
        return back()->with('message', 'School was restored successfully.');
    }
}
