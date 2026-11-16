<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        Skill::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill berhasil ditambahkan');
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

public function update(Request $request, Skill $skill)
{
    $request->validate([
        'name' => 'required',
        'icon' => 'required',
    ]);

    $skill->update([
        'name' => $request->name,
        'icon' => $request->icon,
    ]);

    return redirect()->route('skills.index');
}

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill berhasil dihapus');
    }
}