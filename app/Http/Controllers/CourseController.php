<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan semua kursus
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan formulir tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru dengan validasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|max:20|unique:courses,code',
            'name' => 'required|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1|max:500',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ], [
            'code.required' => 'Kode kursus wajib diisi.',
            'code.max' => 'Kode kursus maksimal 20 karakter.',
            'code.unique' => 'Kode kursus sudah digunakan.',
            'name.required' => 'Nama kursus wajib diisi.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',
            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.integer' => 'Biaya kursus harus berupa angka.',
            'fee.min' => 'Biaya kursus tidak boleh negatif.',
            'quota.required' => 'Kuota peserta wajib diisi.',
            'quota.integer' => 'Kuota harus berupa angka.',
            'quota.min' => 'Kuota minimal 1 peserta.',
            'quota.max' => 'Kuota maksimal 500 peserta.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai tidak valid.',
            'status.required' => 'Status kursus wajib dipilih.',
            'status.in' => 'Status kursus tidak valid.',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Menampilkan detail kursus
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan formulir edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Memperbarui kursus
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|max:20|unique:courses,code,' . $course->id,
            'name' => 'required|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1|max:500',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ], [
            'code.required' => 'Kode kursus wajib diisi.',
            'code.max' => 'Kode kursus maksimal 20 karakter.',
            'code.unique' => 'Kode kursus sudah digunakan.',
            'name.required' => 'Nama kursus wajib diisi.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',
            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.integer' => 'Biaya kursus harus berupa angka.',
            'fee.min' => 'Biaya kursus tidak boleh negatif.',
            'quota.required' => 'Kuota peserta wajib diisi.',
            'quota.integer' => 'Kuota harus berupa angka.',
            'quota.min' => 'Kuota minimal 1 peserta.',
            'quota.max' => 'Kuota maksimal 500 peserta.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai tidak valid.',
            'status.required' => 'Status kursus wajib dipilih.',
            'status.in' => 'Status kursus tidak valid.',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    // Menghapus kursus
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
