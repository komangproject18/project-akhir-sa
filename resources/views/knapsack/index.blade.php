@extends('layouts.app')

@section('content')
    <div class="container mt-5 p-4 rounded shadow" style="max-width: 600px; background-color: #f8f9fa;">
        <h3 class="text-center mb-4 text-primary">Pemilihan Barang Optimal (Knapsack)</h3>

        <form action="{{ route('knapsack.calculate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="capacity" class="form-label">Kapasitas Ransel (max berat):</label>
                <input type="number" name="capacity" id="capacity" class="form-control"
                    placeholder="Masukkan kapasitas maksimum" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Hitung</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">← Kembali ke Beranda</a>
        </div>
    </div>

@endsection