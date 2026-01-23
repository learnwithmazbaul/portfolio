<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Social;
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
        return view('frontend.pages.resume');
    }

    public function projects(){
        return view('frontend.pages.projects');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
}
