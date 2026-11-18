@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Laporan Enrollment KursusKu</h2>
            <p class="text-muted mb-0">Data peserta dan kursus yang diikuti.</p>
        </div>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">+ Tambah Enrollment</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Participant</th>
                        <th>Course</th>
                        <th>Start Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $enrollment->participant->name }}</td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ $enrollment->course->start_date?->format('d-m-Y') }}</td>
                            <td><span class="badge bg-success">{{ $enrollment->status }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada enrollment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection