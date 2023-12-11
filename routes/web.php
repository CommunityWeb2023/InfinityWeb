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


Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified',]] , function (){
    Route::group(['prefix' => 'vote'], function (){
        Route::get('/', [\App\Http\Controllers\VoteController::class, 'index'])->name('vote.index');
    });
});

Route::group([
        'middleware' => [
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified',
            'role:administrator|game_master|support',
            'permission:view dashboard'
        ],
        'prefix' => 'dashboard'
    ], function(){

    Route::get('/',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group([
        'prefix' => 'post'
    ], function() {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'indexAdmin'])->name('post.index');
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
        Route::post('/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{post}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
        Route::patch('/update/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
        Route::post('/update/{post}/image', [\App\Http\Controllers\PostController::class, 'updateImage'])->name('post.image.update');
        Route::delete('/destroy/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    });
});

