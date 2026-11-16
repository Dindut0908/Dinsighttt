<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Guestbook;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'projects'      => Project::latest()->get(),
            'skills'        => Skill::orderByDesc('percentage')->get(),
            'experiences'   => Experience::where('is_active', true)->latest()->get(),
            'certificates'  => Certificate::latest('issued_date')->get(),
            'blogs'         => Blog::where('is_published', true)
                                    ->latest('published_at')
                                    ->take(6)->get(),
            'guestbooks'    => Guestbook::where('is_approved', true)
                                    ->latest()->take(20)->get(),
        ]);
    }
}