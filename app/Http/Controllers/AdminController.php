<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Admin şifresi - gerçek projede .env'de tutulmalı
    private $adminPassword = 'admin123';
    
    public function login()
    {
        return view('admin.login');
    }
    
    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);
        
        if ($request->password === $this->adminPassword) {
            Session::put('admin_authenticated', true);
            return redirect()->route('admin.dashboard')->with('success', 'Başarıyla giriş yaptınız!');
        }
        
        return back()->with('error', 'Hatalı şifre!');
    }
    
    public function dashboard()
    {
        $this->checkAuth();
        
        $blogs = Blog::latest()->get();
        return view('admin.dashboard', compact('blogs'));
    }
    
    public function createBlog()
    {
        $this->checkAuth();
        
        return view('admin.blogs.create');
    }
    
    public function storeBlog(Request $request)
    {
        $this->checkAuth();
        
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:100',
            'content' => 'required|max:10000',
            'tags' => 'nullable|max:500'
        ], [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'category.required' => 'Kategori seçimi zorunludur.',
            'category.max' => 'Kategori en fazla 100 karakter olabilir.',
            'content.required' => 'İçerik alanı zorunludur.',
            'content.max' => 'İçerik en fazla 10.000 karakter olabilir.',
            'tags.max' => 'Etiketler en fazla 500 karakter olabilir.'
        ]);
        
        Blog::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'tags' => $request->tags,
            'author' => 'Kadriye İşik',
            'status' => 'published'
        ]);
        
        return redirect()->route('admin.dashboard')->with('success', 'Blog yazısı başarıyla eklendi!');
    }
    
    public function editBlog(Blog $blog)
    {
        $this->checkAuth();
        
        return view('admin.blogs.edit', compact('blog'));
    }
    
    public function updateBlog(Request $request, Blog $blog)
    {
        $this->checkAuth();
        
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:100',
            'content' => 'required|max:10000',
            'tags' => 'nullable|max:500'
        ], [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'category.required' => 'Kategori seçimi zorunludur.',
            'category.max' => 'Kategori en fazla 100 karakter olabilir.',
            'content.required' => 'İçerik alanı zorunludur.',
            'content.max' => 'İçerik en fazla 10.000 karakter olabilir.',
            'tags.max' => 'Etiketler en fazla 500 karakter olabilir.'
        ]);
        
        $blog->update([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'tags' => $request->tags
        ]);
        
        return redirect()->route('admin.dashboard')->with('success', 'Blog yazısı başarıyla güncellendi!');
    }
    
    public function destroyBlog(Blog $blog)
    {
        $this->checkAuth();
        
        $blog->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Blog yazısı başarıyla silindi!');
    }
    
    public function logout()
    {
        Session::forget('admin_authenticated');
        return redirect()->route('admin.login')->with('success', 'Başarıyla çıkış yaptınız!');
    }
    
    private function checkAuth()
    {
        if (!Session::get('admin_authenticated')) {
            abort(redirect()->route('admin.login')->with('error', 'Bu sayfaya erişmek için giriş yapmalısınız!'));
        }
    }
}
