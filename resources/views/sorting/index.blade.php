@extends('layouts.app')



@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Algoritma Sorting</h5>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light">← Kembali ke Beranda</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('sort') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="numbers" class="form-label">Masukkan angka (pisahkan dengan koma):</label>
                            <input type="text" name="numbers" id="numbers"
                                class="form-control @error('numbers') is-invalid @enderror"
                                placeholder="Contoh: 64, 34, 25, 12, 22, 11, 90"
                                value="{{ old('numbers', '64, 34, 25, 12, 22, 11, 90') }}" required>
                            @error('numbers')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="algorithm" class="form-label">Pilih Algoritma:</label>
                            <select name="algorithm" id="algorithm"
                                class="form-select @error('algorithm') is-invalid @enderror">
                                <option value="bubble" {{ old('algorithm') == 'bubble' ? 'selected' : '' }}>Bubble Sort
                                </option>
                                <option value="selection" {{ old('algorithm') == 'selection' ? 'selected' : '' }}>Selection
                                    Sort</option>
                            </select>
                            @error('algorithm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Start Sorting</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection