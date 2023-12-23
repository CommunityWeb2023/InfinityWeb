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


Route::get('download', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download.index');
Route::get('faq', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq.index');
Route::get('guides', [\App\Http\Controllers\GuidesController::class, 'index'])->name('guides.index');
Route::get('rules', [\App\Http\Controllers\RuleController::class, 'index'])->name('rules.index');
Route::get('features', [\App\Http\Controllers\FeaturesController::class, 'index'])->name('features.index');

Route::group(['prefix' => 'ranking'], function (){
    Route::get('players', [\App\Http\Controllers\RankingController::class, 'players'])->name('ranking.players');
    Route::get('guilds', [\App\Http\Controllers\RankingController::class, 'guilds'])->name('ranking.guilds');
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified',]] , function (){

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    });

    Route::group(['prefix' => 'vote'], function (){
        Route::get('/', [\App\Http\Controllers\VoteController::class, 'index'])->name('vote.index');
    });

    Route::group(['prefix' => 'shop'], function (){
        Route::get('/', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
        Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('shop.add.item.to.cart');
        Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('shop.cart');
        Route::delete('/cart/remove/{cart}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('shop.remove.item.from.cart');
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

    Route::group(['prefix' => 'setting'], function (){
        Route::get('/', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');
        Route::post('/store', [\App\Http\Controllers\SettingController::class, 'store'])->name('setting.store');
        Route::patch('/update', [\App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
    });

    /*Route::group([
        'prefix' => 'download'
    ], function() {
        Route::get('/', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download.index');
        Route::get('/create', [\App\Http\Controllers\DownloadController::class, 'create'])->name('download.create');
        Route::post('/store', [\App\Http\Controllers\DownloadController::class, 'store'])->name('download.store');
        Route::get('/edit/{download}', [\App\Http\Controllers\DownloadController::class, 'edit'])->name('download.edit');
        Route::patch('/update/{download}', [\App\Http\Controllers\DownloadController::class, 'update'])->name('download.update');
        Route::post('/update/{download}/image', [\App\Http\Controllers\DownloadController::class, 'updateImage'])->name('download.image.update');
        Route::delete('/destroy/{download}', [\App\Http\Controllers\DownloadController::class, 'destroy'])->name('download.destroy');
    });*/


    Route::group(['prefix' => 'item'], function (){
        Route::get('/', [\App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
        Route::get('/add/{item}', [\App\Http\Controllers\ShopItemController::class, 'create'])->name('item.create');
        Route::post('/store', [\App\Http\Controllers\ShopItemController::class, 'store'])->name('item.store');
        /*Route::get('/create', [\App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
        Route::post('/store', [\App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
        Route::get('/edit/{item}', [\App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
        Route::patch('/update/{item}', [\App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
        Route::delete('/destroy/{item}', [\App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');*/
    });




});

