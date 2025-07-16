<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

// � Admin Paneli (ÖNCELİKLİ)
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/blogs/create', [AdminController::class, 'createBlog'])->name('admin.blogs.create');
Route::post('/admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'editBlog'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [AdminController::class, 'updateBlog'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [AdminController::class, 'destroyBlog'])->name('admin.blogs.destroy');

// �🚪 Anasayfa – Frontend SPA (Single Page Application)
Route::get('/', function () {
    return view('portfolio');
})->name('home');

// 📄 Blog detay – Frontend kullanıcı için
Route::get('/blog/{id}', [BlogController::class, 'frontendShow'])->name('blog.show');
