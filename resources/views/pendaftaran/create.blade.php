
@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Formulir Pendaftaran Kursus</h2>

    {{-- TES SESSION ERROR --}}
    @if (session()->has('errors'))
        <div class="alert alert-success">
            SESSION ERROR TERBACA
        </div>
    @else
        <div class="alert alert-danger">
            SESSION ERROR TIDAK TERBACA
        </div>
    @endif

    {{-- PESAN VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('courses.store') }}"
                  method="POST"
                  novalidate>

                @csrf

                <div class="mb-3">
                    <label for="code" class="form-label">Kode Kursus</label>
                    <input
                        type="text"
                        name="code"
                        id="code"
                        class="form-control"
                        value="{{ old('code') }}"
                        placeholder="Contoh: WEB-102"
                    >
                    @error('code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kursus</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama kursus"
                    >
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                        rows="3"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fee" class="form-label">Biaya Kursus (Rp)</label>
                    <input
                        type="number"
                        name="fee"
                        id="fee"
                        class="form-control"
                        value="{{ old('fee') }}"
                        min="0"
                    >
                    @error('fee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quota" class="form-label">Kuota Peserta</label>
                    <input
                        type="number"
                        name="quota"
                        id="quota"
                        class="form-control"
                        value="{{ old('quota') }}"
                        min="1"
                        max="500"
                    >
                    @error('quota')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input
                        type="date"
                        name="start_date"
                        id="start_date"
                        class="form-control"
                        value="{{ old('start_date') }}"
                    >
                    @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Kursus</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">-- Pilih Status --</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>
                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Kursus
                </button>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>
    </div>
</div>
@endsection
