<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagePublicationController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Landing Page Profil Dosen & Layanan Publikasi
|--------------------------------------------------------------------------
|
| Alur Pemrosesan Data UTS: Route -> Controller -> Model -> Database -> Blade
|
*/

// Public Landing Page
Route::get('/', HomeController::class)->name('home');

// Public Publications Catalog (Search / Filter / Pagination)
Route::get('/publikasi', [PublicationController::class, 'index'])->name('publikasi');

// Publications CRUD Management Area (Demo UTS - tanpa login)
Route::resource('publications', ManagePublicationController::class)->except(['show']);
