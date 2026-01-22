<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoProperty;
use Illuminate\Http\Request;

class SeoPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seoProperties = SeoProperty::all();
        return view('backend.pages.seoProperty.index', compact('seoProperties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.seoProperty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pageName'=> 'required|in:home,resume,projects,contact',
            'title' => 'required|string|max:50',
            'keywords' => 'required|string|max:500',
            'description' => 'required|string',
            'ogSiteName' => 'required|string|max:100',
            'ogUrl' => 'required|url',
            'ogTitle' => 'required|string|max:255',
            'ogDescription' => 'required|string|max:255',
            'ogImage' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('ogImage')){
            $file = $request->file('ogImage');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seo'), $fileName);
            $validated['ogImage'] = 'uploads/seo/'.$fileName;
        }

        SeoProperty::create($validated);

        flash()->success('SeoProperty created successfully');
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeoProperty $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeoProperty $property)
    {
        return view('backend.pages.seoProperty.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeoProperty $property)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pageName'=> 'required|in:home,resume,projects,contact',
            'title' => 'required|string|max:50',
            'keywords' => 'required|string|max:500',
            'description' => 'required|string',
            'ogSiteName' => 'required|string|max:100',
            'ogUrl' => 'required|url',
            'ogTitle' => 'required|string|max:255',
            'ogDescription' => 'required|string|max:255',
            'ogImage' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('ogImage')){
            if($property->ogImage != null && file_exists(public_path($property->ogImage))){
                unlink(public_path($property->ogImage));
            }

            $file = $request->file('ogImage');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seo'), $fileName);
            $validated['ogImage'] = 'uploads/seo/'.$fileName;
        }

        $property->update($validated);

        flash()->success('SeoProperty updated successfully');
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeoProperty $property)
    {
        if($property->ogImage != null && file_exists(public_path($property->ogImage))){
            unlink(public_path($property->ogImage));
        }
        $property->delete();
        flash()->success('SeoProperty deleted successfully');
        return redirect()->route('properties.index');
    }
}
