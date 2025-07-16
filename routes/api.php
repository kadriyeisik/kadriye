<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;

// Tüm API rotaları buraya
Route::middleware('api')->group(function () {
    // Tüm blogları listele (JSON olarak)
    Route::get('/blogs', [BlogApiController::class, 'index']);

    // Tek bir blogun detayını getir
    Route::get('/blogs/{id}', [BlogApiController::class, 'show']);
});
