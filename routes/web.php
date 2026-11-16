<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// Controllers Frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestbookController;

// Controllers Admin
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GuestbookController as AdminGuestbookController;

/*
|--------------------------------------------------------------------------
| RUTE FRONTEND (PUBLIK)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Guestbook publik (dipanggil via AJAX)
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');

// Rute untuk Download CV (Publik)
Route::get('/download-cv', function () {
    $path = 'cv/cv-dini.pdf'; 
    if (Storage::disk('public')->exists($path)) {
        return Storage::disk('public')->download($path, 'CV_Dini.pdf');
    }
    return back()->with('error', 'File CV belum diunggah.');
})->name('cv.download');


/*
|--------------------------------------------------------------------------
| RUTE ADMIN (BUTUH LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Resource CRUD
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('blogs', BlogController::class);

    // Guestbook Admin
    Route::get('guestbooks', [AdminGuestbookController::class, 'index'])->name('guestbooks.index');
    Route::patch('guestbooks/{guestbook}/approve', [AdminGuestbookController::class, 'approve'])->name('guestbooks.approve');
    Route::delete('guestbooks/{guestbook}', [AdminGuestbookController::class, 'destroy'])->name('guestbooks.destroy');

    // Upload CV (Admin)
    Route::post('/upload-cv', function (Request $request) {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:5120', // Maksimal 5MB
        ]);
        
        // Simpan file dengan nama statis 'cv-dini.pdf' agar menimpa file lama
        $request->file('cv_file')->storeAs('cv', 'cv-dini.pdf', 'public');
        
        return back()->with('success', 'CV berhasil diperbarui!');
    })->name('cv.upload');

});

/*
|--------------------------------------------------------------------------
| RUTE AUTH (Login, Logout, dll)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';