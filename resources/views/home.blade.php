@extends('layouts.app')

@section('title')
<style>
    .algorithms-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-bottom: 40px;
    }

    .algorithm-card {
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .algorithm-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .algorithm-card:hover::before {
        left: 100%;
    }

    .algorithm-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .algorithm-card .icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: #667eea;
        transition: all 0.3s ease;
    }

    .algorithm-card:hover .icon {
        transform: scale(1.1);
        color: #764ba2;
    }

    .algorithm-card h3 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .algorithm-card p {
        color: #7f8c8d;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .fibonacci-section {
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin: 0 auto;
        max-width: 400px;
    }

    .fibonacci-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .fibonacci-section:hover::before {
        left: 100%;
    }

    .fibonacci-section:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .fibonacci-section .icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: #667eea;
        transition: all 0.3s ease;
    }

    .fibonacci-section:hover .icon {
        transform: scale(1.1);
        color: #764ba2;
    }

    .fibonacci-section h3 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .fibonacci-section p {
        color: #7f8c8d;
        font-size: 0.95rem;
        line-height: 1.6;
    }


    .algorithm-descriptions {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid #ecf0f1;
    }

    .description-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .description-item {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #667eea;
    }

    .description-item h4 {
        color: #2c3e50;
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .description-item p {
        color: #7f8c8d;
        font-size: 0.9rem;
        line-height: 1.5;
    }


    .btn-demo {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-demo:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        text-decoration: none;
        color: white;
    }
</style>

@section('content')
    <div class="algorithms-grid">
        <div class="algorithm-card">
            <div class="icon">
                <i class="fas fa-sort-amount-up"></i>
            </div>
            <h3>Sorting</h3>
            <p>Algoritma pengurutan data seperti Bubble Sort, Quick Sort, dan Merge Sort untuk mengurutkan data secara
                efisien.</p>
            <a href="{{ route('index') }}" class="btn-demo">Lihat Demo</a>
        </div>

        <div class="algorithm-card">
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3>Knapsack</h3>
            <p>Algoritma optimasi untuk memecahkan masalah knapsack menggunakan pendekatan dynamic programming.</p>
            <a href="{{ route('knapsack.index') }}" class="btn-demo">Lihat Demo</a>
        </div>

        <div class="algorithm-card">
            <div class="icon">
                <i class="fas fa-coins"></i>
            </div>
            <h3>Coin Change</h3>
            <p>Algoritma untuk mencari jumlah minimum koin yang diperlukan untuk membuat nilai tertentu.</p>
            <a href="{{ route('coin.index') }}" class="btn-demo">Lihat Demo</a>
        </div>

        <div class="algorithm-card">
            <div class="icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Binary Search</h3>
            <p>Algoritma pencarian efisien untuk mencari elemen dalam array yang sudah terurut dengan kompleksitas O(log n).
            </p>
            <a href="{{ route('search.index') }}" class="btn-demo">Lihat Demo</a>
        </div>
    </div>

    <div class="fibonacci-section">
        <div class="icon">
            <i class="fas fa-infinity"></i>
        </div>
        <h3>Fibonacci</h3>
        <p>Implementasi algoritma Fibonacci dengan berbagai pendekatan: rekursif, iteratif, dan dynamic programming.</p>
        <a href="{{ route('fibonacci.index') }}" class="btn-demo">Lihat Demo</a>
    </div>
@endsection