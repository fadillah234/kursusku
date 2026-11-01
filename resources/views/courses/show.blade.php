@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detail Kursus</h2>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">Kode Kursus</th>
                    <td>{{ $course->code }}</td>
                </tr>
                <tr>
                    <th>Nama Kursus</th>
                    <td>{{ $course->name }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $course->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Biaya</th>
                    <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Kuota</th>
                    <td>{{ $course->quota }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $course->start_date?->format('d-m-Y') ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($course->status) }}</td>
                </tr>
            </table>

            <a href="{{ route('courses.edit', $course->id) }}"
               class="btn btn-warning">
                Edit Kursus
            </a>
        </div>
    </div>
</div>
@endsection
