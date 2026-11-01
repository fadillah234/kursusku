@extends('layouts.app')

@section('title', 'Edit Kursus')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Kursus</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Kursus</label>
                    <input type="text" name="code"
                           class="form-control"
                           value="{{ old('code', $course->code) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Kursus</label>
                    <input type="text" name="name"
                           class="form-control"
                           value="{{ old('name', $course->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control"
                              rows="3">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya (Rp)</label>
                    <input type="number" name="fee"
                           class="form-control"
                           value="{{ old('fee', $course->fee) }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kuota</label>
                    <input type="number" name="quota"
                           class="form-control"
                           value="{{ old('quota', $course->quota) }}"
                           min="1" max="500" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date"
                           class="form-control"
                           value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="draft" @selected(old('status', $course->status) == 'draft')>Draft</option>
                        <option value="open" @selected(old('status', $course->status) == 'open')>Open</option>
                        <option value="closed" @selected(old('status', $course->status) == 'closed')>Closed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
