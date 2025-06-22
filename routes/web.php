<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminValidasi;
use App\Livewire\Register;


Route::view('/', 'welcome')->name('welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', AdminValidasi::class])
    ->name('dashboard');
    
Route::view('/fakultas', 'fakultas')
    ->middleware(['auth', AdminValidasi::class])
    ->name('fakultas');

Route::view('/prodi', 'prodi')
    ->middleware(['auth', AdminValidasi::class])
    ->name('prodi');

Route::view('/matakuliah', 'matakuliah')
    ->middleware(['auth', AdminValidasi::class])
    ->name('matakuliah');

Route::view('/mahasiswa', 'mahasiswa')
    ->middleware(['auth', AdminValidasi::class])
    ->name('mahasiswa');

Route::view('profile', 'profile')
    ->middleware(['auth', AdminValidasi::class])
    ->name('profile');

    Route::get('/krs', function () {
    return view('welcome');
})->middleware(['auth'])->name('krs');



require __DIR__.'/auth.php';
