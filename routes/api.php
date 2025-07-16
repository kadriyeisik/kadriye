<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;
use Illuminate\Support\Facades\Artisan;

// Tüm API rotaları buraya
Route::middleware('api')->group(function () {
    // Tüm blogları listele (JSON olarak)
    Route::get('/blogs', [BlogApiController::class, 'index']);

    // Tek bir blogun detayını getir
    Route::get('/blogs/{id}', [BlogApiController::class, 'show']);
    
    // Geçici cache clear endpoint
    Route::get('/clear-cache', function () {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        return response()->json(['message' => 'Cache cleared successfully']);
    });
});
