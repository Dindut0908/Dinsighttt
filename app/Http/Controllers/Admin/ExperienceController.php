<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position'     => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'period'       => 'required|string|max:100',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'is_active'    => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('experiences', 'public');
        }

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil ditambahkan.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'position'     => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'period'       => 'required|string|max:100',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'is_active'    => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($experience->image) Storage::disk('public')->delete($experience->image);
            $validated['image'] = $request->file('image')->store('experiences', 'public');
        }

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Pengalaman berhasil diperbarui.');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->image) Storage::disk('public')->delete($experience->image);
        $experience->delete();
        return back()->with('success', 'Pengalaman berhasil dihapus.');
    }
}