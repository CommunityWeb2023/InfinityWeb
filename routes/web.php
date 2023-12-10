<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/all', [\App\Http\Controllers\PostController::class, 'all'])->name('post.all');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
    })->name('dashboard');
});
