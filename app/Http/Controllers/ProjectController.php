<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image')
            ->store('projects', 'public');

        Project::create([
    'title' => $request->title,
    'slug' => Str::slug($request->title),
    'description' => $request->description,
    'image' => $image,
]);

        return redirect('/projects');
    }
}