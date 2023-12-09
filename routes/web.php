<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/search', [DetailsController::class, 'searchUser']);
Route::get('/sortbyjoin', [DetailsController::class, 'sortbyjoin']);
Route::get('/sortbyrelevance', [DetailsController::class, 'sortbyrelevance']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
    Route::get('/profile/{id}', [DetailsController::class, 'userDetails']);
    Route::post('/profile', [DetailsController::class, 'saveProfile']);
    Route::post('/updateprofile', [DetailsController::class, 'updateProfile'])->name('route.updateprofile');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);