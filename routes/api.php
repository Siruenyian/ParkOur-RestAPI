<?php

use App\Http\Controllers\ParkirController;
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
Route::get('/caritempat/{nama}', [ParkirController::class, 'CariTempat']);
Route::get('/caritempat', [ParkirController::class, 'DisplayTempat']);
Route::get('/history', [ParkirController::class, 'DisplayHistory']);
Route::get('/history/{transaksiId::uuid}', [ParkirController::class, 'DisplayHistoryDetail']);
Route::post('/masukparkir', [ParkirController::class, 'MasukParkir']);
Route::post('/bayarparkir', [ParkirController::class, 'BayarParkir']);
