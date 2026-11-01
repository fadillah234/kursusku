<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman formulir pendaftaran
Route::get('/pendaftaran', function () {
    return view('enrollments.create');
})->name('enrollments.create');

// Memproses dan memvalidasi formulir
Route::post('/pendaftaran/preview', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'course_id' => ['required', 'in:web,design,data'],
    ]);

    return redirect()
        ->route('enrollments.create')
        ->with('success', 'Validasi berhasil. Formulir pendaftaran siap diperiksa.');
})->name('enrollments.preview');

// Data ketersediaan kursus untuk Ajax
Route::get('/courses/{course}/availability', function (string $course) {
    $availability = [
        'web' => 12,
        'design' => 8,
        'data' => 5,
    ];

    if (!array_key_exists($course, $availability)) {
        return response()->json([
            'message' => 'Kursus tidak ditemukan.',
        ], 404);
    }

    return response()->json([
        'course' => $course,
        'remaining' => $availability[$course],
    ]);
})->name('courses.availability');

// Route CRUD Kursus
Route::resource('courses', CourseController::class);

