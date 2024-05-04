<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::middleware('guest')->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::get('register', 'register_create')->name('register');
        Route::post('register', 'register_store');

        Route::get('login', 'login_create')->name('login');
        Route::post('login', 'login_check');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('log-out', 'login_destroy');

        Route::get('my-links', 'my_links_create')->name('my-links');
        Route::get('new-link', 'new_link_create');
        Route::post('new-link', 'new_link_store');

        Route::get('settings', 'settings_create')->name('settings');
        Route::put('settings', 'settings_update');
    });

    Route::delete('delete-link/{url:id}', [UrlController::class, 'destroy'])->where(['id' => '[0-9]+'])->missing(function () {
        return redirect()->back();
    });
});

Route::get('contact', [MainController::class, 'contact_create']);
Route::post('contact', [MainController::class, 'contact_store']);

Route::get('{short_link}', [UrlController::class, 'check'])->whereAlphaNumeric('short_link'); // Must be in bottom bcs it overrides everything else below this function
