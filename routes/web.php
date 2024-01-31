<?php

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

Route::get('/', function () {  
    return view('welcome');
});

Route::get('/verify/{category}/{uuid}', [App\Http\Controllers\MainController::class, 'verify'])->name('verify');

Route::middleware('verifyRateLimiter')->group(function () {
Route::post('/verify/{category}/{uuid}', [App\Http\Controllers\MainController::class, 'verifyDocument'])->name('document.verify');
});
