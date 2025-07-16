<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

// 🚪 Anasayfa – Frontend SPA (Single Page Application)
Route::get('/', function () {
    return view('portfolio');
})->name('home');

// 📄 Blog detay – Frontend kullanıcı için
Route::get('/blog/{id}', [BlogController::class, 'frontendShow'])->name('blog.show');

// 🔒 Admin Paneli
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin giriş sayfaları
    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    
    // Admin dashboard ve blog yönetimi
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/blogs/create', [AdminController::class, 'createBlog'])->name('blogs.create');
    Route::post('/blogs', [AdminController::class, 'storeBlog'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [AdminController::class, 'editBlog'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [AdminController::class, 'updateBlog'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [AdminController::class, 'destroyBlog'])->name('blogs.destroy');
});
