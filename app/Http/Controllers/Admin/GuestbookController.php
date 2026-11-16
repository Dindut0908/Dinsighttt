<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;

class GuestbookController extends Controller
{
    public function index()
    {
        $guestbooks = Guestbook::latest()->paginate(20);
        return view('admin.guestbooks.index', compact('guestbooks'));
    }

    public function approve(Guestbook $guestbook)
    {
        $guestbook->update(['is_approved' => true]);
        return back()->with('success', 'Pesan disetujui.');
    }

    public function destroy(Guestbook $guestbook)
    {
        $guestbook->delete();
        return back()->with('success', 'Pesan dihapus.');
    }
}