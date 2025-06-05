@extends('layouts.app')



@section('content')

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title text-center text-success mb-4">Algoritma Coin Change</h4>

            <form method="POST" action="{{ route('coin.change') }}">
                @csrf
                <div class="mb-3">
                    <label for="amount" class="form-label">Masukkan Jumlah Uang:</label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Contoh: 100000" min="1" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-primary">← Kembali ke Beranda</a>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection