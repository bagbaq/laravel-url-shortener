<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;

Route::get('user/get_token', [APIController::class, 'get_token']);

Route::post('user/links', [APIController::class, 'link_store'])->middleware('auth:sanctum'); // Create
Route::get('user/links/{id}', [APIController::class, 'link_read'])->middleware('auth:sanctum'); // Read
Route::put('user/links/{id}', [APIController::class, 'link_update'])->middleware('auth:sanctum'); // Update
Route::delete('user/links/{id}', [APIController::class, 'link_destroy'])->middleware('auth:sanctum'); // Delete

Route::get('user/links', [APIController::class, 'link_read_all'])->middleware('auth:sanctum'); // Read All
