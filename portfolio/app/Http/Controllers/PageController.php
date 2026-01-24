<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Social;
use App\Models\Project;
use App\Models\Language;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HeroProperty;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $heroProperty = HeroProperty::select('keyLine','title','short_title','img')->first();
        $about = About::first();
        $socialLinks = Social::all();
        return view('frontend.pages.index',compact('heroProperty','about','socialLinks'));
    }

    public function resume(){
        $resume = Resume::first();
        $experiences = Experience::all();
        $educations = Education::all();
        $skills = Skill::all();
        $languages = Language::all();
        return view('frontend.pages.resume',compact('resume','experiences','educations','skills','languages'));
    }

    public function projects(){
        $projects = Project::all();
        return view('frontend.pages.projects',compact('projects'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
}
