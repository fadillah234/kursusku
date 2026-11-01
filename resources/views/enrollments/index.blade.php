@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Kursus</h2>

    <a href="{{ route('courses.create') }}" class="btn btn-primary">
        + Tambah Kursus
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Biaya</th>
                    <th>Kuota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->name }}</td>
                        <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                        <td>{{ $course->quota }}</td>
                        <td>{{ ucfirst($course->status) }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course->id) }}"
                               class="btn btn-info btn-sm">Detail</a>

                            <a href="{{ route('courses.edit', $course->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('courses.destroy', $course->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data kursus.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection