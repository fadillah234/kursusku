@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Formulir Pendaftaran Kursus</h1>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('enrollments.preview') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select
                            class="form-select"
                            id="course_id"
                            name="course_id"
                            required
                        >
                            <option value="">-- Pilih Kursus --</option>
                            <option value="web" {{ old('course_id') == 'web' ? 'selected' : '' }}>
                                Pemrograman Web
                            </option>
                            <option value="design" {{ old('course_id') == 'design' ? 'selected' : '' }}>
                                Desain Grafis
                            </option>
                            <option value="data" {{ old('course_id') == 'data' ? 'selected' : '' }}>
                                Analisis Data
                            </option>
                        </select>
                        @error('course_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="availability" class="alert alert-info" role="status">
                        Pilih kursus untuk melihat sisa kursi.
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Daftar Kursus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection