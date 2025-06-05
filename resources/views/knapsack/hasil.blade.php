@extends('layouts.app')

@section('content')
    <div class="container mt-5 p-4 rounded shadow" style="max-width: 700px; background-color: #f8f9fa;">
        <h3 class="text-center mb-4 text-success">Hasil Pemilihan Barang</h3>

        <div class="mb-3">
            <p><strong>Kapasitas Ransel:</strong> {{ $capacity }}</p>
            <p><strong>Total Nilai Maksimal:</strong> {{ $totalValue }}</p>
        </div>

        <div class="mb-3">
            <h5 class="text-primary">Barang Terpilih:</h5>
            @if(count($selectedProducts) > 0)
                <ul class="list-group list-group-flush">
                    @foreach($selectedProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge bg-info text-dark">
                                Berat: {{ $product->weight }} | Nilai: {{ $product->value }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada barang yang dipilih.</p>
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('knapsack.index') }}" class="btn btn-outline-success">
                <i class="fas fa-undo"></i> Ulangi Perhitungan
            </a>
        </div>
    </div>

@endsection