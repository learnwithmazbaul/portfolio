<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('backend.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'projectLink' => 'nullable',
            'details' => 'required',
            'thumbnailImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->projectLink = $request->projectLink;
        $project->details = $request->details;

        if ($request->hasFile('thumbnailImg')) {
            $image = $request->file('thumbnailImg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $imageName);
            $filePath = 'images/projects/' . $imageName;
            $project->thumbnailImg = $filePath;
        }

        $project->save();
        flash()->success('Project created successfully');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('backend.pages.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'projectLink' => 'nullable',
            'details' => 'required',

        ]);

        $project->title = $request->title;
        $project->projectLink = $request->projectLink;
        $project->details = $request->details;

        if ($request->hasFile('thumbnailImg')) {

            if ($project->thumbnailImg != null && file_exists(public_path($project->thumbnailImg))) {
                unlink(public_path($project->thumbnailImg));
            }

            $request->validate([
                'thumbnailImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $image = $request->file('thumbnailImg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $imageName);
            $filePath = 'images/projects/' . $imageName;
            $project->thumbnailImg = $filePath;
        }

        $project->save();
        flash()->success('Project created successfully');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->thumbnailImg != null && file_exists(public_path($project->thumbnailImg))) {
            unlink(public_path($project->thumbnailImg));
        }

        $project->delete();
        flash()->success('Project deleted successfully');
        return redirect()->route('projects.index');
    }
}
