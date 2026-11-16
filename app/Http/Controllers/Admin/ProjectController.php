<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Tampilkan daftar project
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.projects.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'demo_link'   => 'nullable|url|max:255',
            'repo_link'   => 'nullable|url|max:255',
            'tech_stack'  => 'nullable|string|max:255',
        ]);

        // Simpan gambar ke storage/app/public/projects
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    // Form edit
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // Update data
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'demo_link'   => 'nullable|url|max:255',
            'repo_link'   => 'nullable|url|max:255',
            'tech_stack'  => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    // Hapus
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return back()->with('success', 'Project berhasil dihapus.');
    }
}