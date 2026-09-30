<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Artisan;

Route::inertia('/', 'LFS/Start')->name('home');
Route::inertia('/portfolio', 'LFS/Portfolio')->name('portfolio');
Route::inertia('/about', 'LFS/About')->name('about');
Route::inertia('/imprint', 'LFS/Imprint')->name('imprint');
Route::inertia('/privacy', 'LFS/Privacy')->name('privacy');



Route::get("/images/{filename}", [StorageController::class, "index"])->name("image.show");
Route::get("/gallery", [StorageController::class, "GetGallery"])->name("gallery.show");

// Route::get('/migrate', function () {
//     try {
//         Artisan::call('migrate:refresh');
//         return 'migration successful!';
//     } catch (Exception $e) {
//         return 'Error: ' . $e->getMessage();
//     }
// });



// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::inertia('dashboard', 'Dashboard')->name('dashboard');
// });

// require __DIR__.'/settings.php';