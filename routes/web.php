<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SortingController;
use App\Http\Controllers\KnapsackController;
use App\Http\Controllers\FibonacciController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect()->route('index');
// });

// Login dan Register: hanya untuk guest
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('regis');
    Route::post('/register', [AuthController::class, 'regis'])->name('regis.store');
});

// Semua fitur hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/beranda', [SortingController::class, 'home'])->name('home');
    Route::get('/sorting', [SortingController::class, 'index'])->name('index');
    Route::post('/sorting/sort', [SortingController::class, 'sort'])->name('sort');

    Route::get('/knapsack', [KnapsackController::class, 'index'])->name('knapsack.index');
    Route::post('/knapsack/calculate', [KnapsackController::class, 'calculate'])->name('knapsack.calculate');

    Route::get('/coin-change', [CoinController::class, 'showForm'])->name('coin.index');
    Route::post('/coin-change', [CoinController::class, 'makeChange'])->name('coin.change');

    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/search', [SearchController::class, 'process'])->name('search.process');

    Route::get('/fibonacci', [FibonacciController::class, 'index'])->name('fibonacci.index');
    Route::post('/fibonacci', [FibonacciController::class, 'generate'])->name('fibonacci.generate');

    // Logout via POST
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    // Tambahan: handle GET logout agar tidak error
    Route::get('/logout', function () {
        return redirect('/beranda'); // melempar ke beranda jika user coba akses /logout langsung
    });
});
