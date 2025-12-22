<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('backend.pages.experiences.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'duration' => 'required',
            'title' => 'required',
            'designation' => 'required',
            'details' => 'required',
        ]);

        Experience::create($request->all());
        flash()->success('Experience Created Successfully');
        return redirect()->route('experiences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('backend.pages.experiences.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'duration' => 'required',
            'title' => 'required',
            'designation' => 'required',
            'details' => 'required',
        ]);
        $experience->update($request->all());
        flash()->success('Experience Updated Successfully');
        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        flash()->success('Experience Deleted Successfully');
        return redirect()->route('experiences.index');
    }
}
