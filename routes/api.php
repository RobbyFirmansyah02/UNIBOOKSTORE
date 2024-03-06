<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiKategori;
use App\Http\Controllers\API\ApiBuku;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/family', [ApiKategori::class, 'getData']);

Route::get('/kategori', [ApiKategori::class, 'getData']);
Route::get('/kategori/show/{id}', [ApiKategori::class, 'show']);
Route::get('/kategori/delete/{id}', [ApiKategori::class, 'destroy']);
Route::post('/kategori/store', [ApiKategori::class, 'store']);
Route::post('/kategori/update/{id}', [ApiKategori::class, 'update']);

Route::get('/buku', [ApiBuku::class, 'getData']);
Route::get('/buku/show/{id}', [ApiBuku::class, 'show']);
Route::get('/buku/delete/{id}', [ApiBuku::class, 'destroy']);
Route::post('/buku/store', [ApiBuku::class, 'store']);
Route::post('/buku/update/{id}', [ApiBuku::class, 'update']);
