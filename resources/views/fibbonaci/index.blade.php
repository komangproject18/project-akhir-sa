@extends('layouts.app')



@section('content')
    <div class="container mt-5" style="max-width: 700px;">
        <div class="p-4 rounded shadow bg-light">
            <h3 class="text-center text-primary mb-4">Program Deret Fibonacci</h3>

            <form action="{{ route('fibonacci.generate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="n" class="form-label">Jumlah angka (n):</label>
                    <input type="number" name="n" id="n" class="form-control" value="{{ old('n') }}" min="1" max="100"
                        required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-list-ol"></i> Tampilkan Deret
                    </button>
                </div>
            </form>

            @isset($fibonacci)
                <div class="card mt-4 border-info">
                    <div class="card-header bg-info text-white">
                        Hasil Deret Fibonacci ({{ $n }} angka)
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light border border-info text-dark">
                            {{ implode(', ', $fibonacci) }}
                        </div>
                    </div>
                </div>
            @endisset

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

@endsection