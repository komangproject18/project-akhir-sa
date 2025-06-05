@extends('layouts.app')



@section('content')
    <div class="container mt-4" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-success">Hasil Penukaran Koin</h4>
                <p class="text-muted">Berikut adalah kombinasi koin yang digunakan:</p>

                <ul class="list-group list-group-flush mb-3">
                    @foreach($coinsUsed as $coin)
                        <li class="list-group-item">
                            <i class="fas fa-coins text-warning me-2"></i> {{ $coin }}
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('coin.index') }}" class="btn btn-outline-primary w-100">Ulangi Penukaran</a>
            </div>
        </div>
    </div>

@endsection