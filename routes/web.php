<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::post('/login', [AuthenticationController::class, 'store'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/tempat', [WebController::class, 'DisplayTempat'])->name('displaytempat');
    Route::get('/tempat/{id:uuid}', [WebController::class, 'DisplayTempatDetail'])->name('displaytempatdetail');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
