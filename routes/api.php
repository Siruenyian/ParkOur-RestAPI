<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//harus/api dulu
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/caritempat/{nama}', [APIController::class, 'CariTempat']);
Route::get('/caritempat', [APIController::class, 'DisplayTempat']);
Route::get('/history', [APIController::class, 'DisplayHistory']);
Route::get('/history/{transaksiId::uuid}', [APIController::class, 'DisplayHistoryDetail']);
Route::post('/masukparkir', [APIController::class, 'MasukParkir']);
Route::post('/bayarparkir', [APIController::class, 'BayarParkir']);
Route::get('/cekbiaya/{transaksiId::uuid}', [APIController::class, 'CekBiaya']);
