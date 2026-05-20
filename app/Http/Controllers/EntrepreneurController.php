<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function index()
    {
        $entrepreneurs = Entrepreneur::latest()->get();

        return view('entrepreneurs.index', compact('entrepreneurs'));
    }

    public function create()
    {
        return view('entrepreneurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image')
            ->store('entrepreneurs', 'public');

        Entrepreneur::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()
            ->route('entrepreneurs.index')
            ->with('success', 'Entrepreneur berhasil ditambahkan');
    }

    public function edit(Entrepreneur $entrepreneur)
    {
        return view('entrepreneurs.edit', compact('entrepreneur'));
    }

    public function update(Request $request, Entrepreneur $entrepreneur)
    {
        $image = $entrepreneur->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('entrepreneurs', 'public');
        }

        $entrepreneur->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()
            ->route('entrepreneurs.index')
            ->with('success', 'Entrepreneur berhasil diupdate');
    }

    public function destroy(Entrepreneur $entrepreneur)
    {
        $entrepreneur->delete();

        return redirect()
            ->route('entrepreneurs.index')
            ->with('success', 'Entrepreneur berhasil dihapus');
    }
}