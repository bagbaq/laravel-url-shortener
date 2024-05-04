<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('register', [UserController::class, 'register_create'])->middleware('guest')->name('register');
Route::post('register', [UserController::class, 'register_store'])->middleware('guest');

Route::get('login', [UserController::class, 'login_create'])->middleware('guest')->name('login');
Route::post('login', [UserController::class, 'login_check'])->middleware('guest');
Route::post('log-out', [UserController::class, 'login_destroy'])->middleware('auth');

Route::get('my-links', [UserController::class, 'my_links_create'])->middleware('auth')->name('my-links');
Route::get('new-link', [UserController::class, 'new_link_create'])->middleware('auth');
Route::post('new-link', [UserController::class, 'new_link_store'])->middleware('auth');
Route::delete('delete-link/{url:id}', [UrlController::class, 'destroy'])->middleware('auth');

Route::get('settings', [UserController::class, 'settings_create'])->middleware('auth')->name('settings');
Route::put('settings', [UserController::class, 'settings_update'])->middleware('auth');

Route::get('contact', [MainController::class, 'contact_create']);
Route::post('contact', [MainController::class, 'contact_store']);

Route::get('{short_link}', [UrlController::class, 'check']); // Must be in bottom bcs it overrides everything else below this function
