<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        return view('backend.pages.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'duration' => 'required',
            'institutionName' => 'required',
            'field' => 'required',
            'subject' => 'required',
            'details' => 'required',
        ]);

        Education::create($request->all());

        flash()->success('Education Created Successfully');
        return redirect()->route('educations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('backend.pages.education.edit',compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'duration' => 'required',
            'institutionName' => 'required',
            'field' => 'required',
            'subject' => 'required',
            'details' => 'required',
        ]);

        $education->update($request->all());

        flash()->success('Education Created Successfully');
        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        flash()->success('Education Deleted Successfully');
        return redirect()->route('educations.index');
    }
}
