@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Tambah Enrollment</h2>
        <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

    <form action="{{ route('enrollments.store') }}" method="POST" class="card shadow-sm" novalidate>
        @csrf

        <div class="card-body">
            <div class="mb-3">
                <label for="participant_id" class="form-label">Participant</label>
                <select id="participant_id" name="participant_id"
                        class="form-select @error('participant_id') is-invalid @enderror">
                    <option value="">-- Pilih Participant --</option>
                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}"
                            @selected(old('participant_id') == $participant->id)>
                            {{ $participant->name }} - {{ $participant->email }}
                        </option>
                    @endforeach
                </select>
                @error('participant_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select id="course_id" name="course_id"
                        class="form-select @error('course_id') is-invalid @enderror">
                    <option value="">-- Pilih Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            @selected(old('course_id') == $course->id)>
                            {{ $course->code }} - {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Enrollment</button>
        </div>
    </form>
</div>
@endsection