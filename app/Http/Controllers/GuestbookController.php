<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'nullable|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $validated['ip_address']  = $request->ip();
        $validated['is_approved'] = true;

        $guestbook = Guestbook::create($validated);

        // Response JSON untuk AJAX (real-time)
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim!',
            'data'    => [
                'name'       => $guestbook->name,
                'message'    => $guestbook->message,
                'created_at' => $guestbook->created_at->diffForHumans(),
            ],
        ]);
    }
}