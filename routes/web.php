<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('tracking');
});

Route::get('/get', [App\Http\Controllers\PacketController::class, 'create'])->name('getForm')->middleware('auth');
Route::post('/registerPacket', [App\Http\Controllers\PacketController::class, 'store'])->name('register_packet')->middleware('auth');

Route::get('/print/{id}',[App\Http\Controllers\PacketController::class, 'print'])->middleware('auth')->name('afficher');

Route::get('/print',[App\Http\Controllers\PacketController::class, 'printDefault'])->name('print')->middleware('auth');

Route::get('/recus',[App\Http\Controllers\PacketController::class, 'printRecus'])->middleware('auth');

Route::get('/cours',[App\Http\Controllers\PacketController::class, 'printCours'])->middleware('auth');

Route::get('/gare',[App\Http\Controllers\PacketController::class, 'printGare'])->middleware('auth');

Route::get('/generate', [App\Http\Controllers\PacketController::class, 'createPDF'])->middleware('auth');

Route::post('/tweak/{id}', [App\Http\Controllers\PacketController::class, 'edit'])->name('tweak');

Route::get('/modifier/{id}', [App\Http\Controllers\PacketController::class, 'modifier']);

Route::get('/delete/{id}', [App\Http\Controllers\PacketController::class, 'delete']);
// Route::get('/about', function () {
//     return view('about-us');
// });

Route::get('/admin', [App\Http\Controllers\PacketController::class, 'index'])->name('admin')->middleware('auth');

// Route::get('/contact', function () {
//     return view('contact-us');
// });

// Route::get('/create', function () {
//     return view('create_packet');
// });

// Route::get('/index', function () {
//     return view('index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
