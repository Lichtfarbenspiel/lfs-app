<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageController;

Route::inertia('/', 'LFS/Start')->name('home');
Route::inertia('/portfolio', 'LFS/Portfolio')->name('portfolio');
Route::inertia('/about', 'LFS/About')->name('about');
Route::inertia('/imprint', 'LFS/Imprint')->name('imprint');



Route::get("/images/{filename}", [StorageController::class, "index"])->name("image.show");
Route::get("/gallery", [StorageController::class, "GetGallery"])->name("gallery.show");


Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';