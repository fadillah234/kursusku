<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Pertemuan 9: formulir pendaftaran lama (validasi + Ajax)
Route::get('/pendaftaran', function () {
    return view('pendaftaran.create');
})->name('pendaftaran.create');

Route::post('/pendaftaran/preview', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'course_id' => ['required', 'in:web,design,data'],
    ]);

    return redirect()
        ->route('pendaftaran.create')
        ->with('success', 'Validasi berhasil. Formulir pendaftaran siap diperiksa.');
})->name('pendaftaran.preview');

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

// Pertemuan 12: enrollment relasional
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);