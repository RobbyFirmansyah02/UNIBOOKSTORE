<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('master.app');
})->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/mahesvara', function () {
    return "Tatsuya Shiba";
});

/*
| routing dengan controller
|
*/
Route::get('/mahasantri_petik', [MahasantriController::class, 'index'])->name('santri');
Route::get('/mahasantri_cari', [MahasantriController::class, 'cari'])->name('search');

// Route::get('/mahasantri/{id}', [MahasantriController::class, 'getid']);
Route::get('/mahasantri/{id}', [MahasantriController::class, 'tugas']);

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/show/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
// Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::resource('buku', BukuController::class);
Route::resource('kategori', BukuController::class);