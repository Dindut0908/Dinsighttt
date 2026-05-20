<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Entrepreneur;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        $skills = Skill::all();

        $entrepreneurs = Entrepreneur::latest()->get();

        return view('home', compact(
            'projects',
            'skills',
            'entrepreneurs'
        ));
    }
}