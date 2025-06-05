@extends('layouts.app')


<style>
    #array-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }

    #array-container div {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border: 2px solid #ccc;
    }
</style>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hasil</div>
                <div class="card-body">
                    <p><strong>Hasil Sorting ({{ ucfirst($algorithm) }} Sort):</strong></p>
                    <p>{{ implode(', ', $sorted) }}</p>

                    @if (!is_null($search))
                        <p><strong>Hasil Binary Search:</strong></p>
                        @if ($searchResult != -1)
                            <p>Angka <strong>{{ $search }}</strong> ditemukan di indeks <strong>{{ $searchResult }}</strong> (posisi
                                ke-{{ $searchResult + 1 }})</p>
                        @else
                            <p>Angka <strong>{{ $search }}</strong> tidak ditemukan dalam array.</p>
                        @endif
                        <div class="mt-4">
                            <h5>Visualisasi Binary Search</h5>
                            <div id="array-container"></div>
                            <div id="log" class="mt-3 p-2 bg-light border rounded" style="min-height: 80px;"></div>
                        </div>
                    @endif

                    <a href="{{ route('search.index') }}" class="btn btn-outline-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const array = @json($sorted);
        const target = {{ $search }};
        const container = document.getElementById('array-container');
        const log = document.getElementById('log');
        let stepDelay = 1000; // 1 detik per langkah

        function renderArray(low, mid, high) {
            container.innerHTML = '';
            array.forEach((num, index) => {
                const box = document.createElement('div');
                box.className = 'border p-2 text-center rounded';
                box.style.minWidth = '40px';
                box.style.transition = 'all 0.3s';
                box.innerText = num;

                if (index === mid) {
                    box.style.backgroundColor = '#0d6efd'; // biru untuk mid
                    box.style.color = 'white';
                }
                if (index === low) box.style.borderLeft = '4px solid green';
                if (index === high) box.style.borderRight = '4px solid red';

                container.appendChild(box);
            });
        }

        async function visualizeBinarySearch() {
            let low = 0;
            let high = array.length - 1;
            log.innerHTML = '';

            while (low <= high) {
                let mid = Math.floor((low + high) / 2);
                renderArray(low, mid, high);
                log.innerHTML += `<div>Memeriksa indeks tengah (${mid}) dengan nilai ${array[mid]}</div>`;

                await new Promise(resolve => setTimeout(resolve, stepDelay));

                if (array[mid] === target) {
                    log.innerHTML += `<div class="text-success"><strong>✓ Ditemukan! Angka ${target} ada di indeks ${mid}</strong></div>`;
                    renderArray(mid, mid, mid); // Fokus pada hasil
                    return;
                } else if (array[mid] < target) {
                    log.innerHTML += `<div>→ Karena ${array[mid]} < ${target}, geser ke kanan</div>`;
                    low = mid + 1;
                } else {
                    log.innerHTML += `<div>← Karena ${array[mid]} > ${target}, geser ke kiri</div>`;
                    high = mid - 1;
                }

                await new Promise(resolve => setTimeout(resolve, stepDelay));
            }

            // Tidak ditemukan
            renderArray(-1, -1, -1);
            log.innerHTML += `<div class="text-danger"><strong>✗ Angka ${target} tidak ditemukan.</strong></div>`;
        }

        visualizeBinarySearch(); // Jalankan otomatis saat halaman dimuat
    });
</script>