<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // 🆕 Frontend blog listesi (anasayfa)
    public function frontendIndex()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('index', compact('blogs'));
    }

    // 🆕 Frontend blog detay sayfası
    public function frontendShow($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.detail', compact('blog'));
    }

    // 🔒 Admin Paneli – Blogları listele (arama + filtreleme desteğiyle)
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('author')) {
            $query->where('author', $request->author);
        }

        $blogs = $query->orderBy('created_at', 'desc')->get();
        $authors = Blog::select('author')->distinct()->pluck('author');

        return view('admin.blog.index', compact('blogs', 'authors'));
    }

    // 🔒 Admin – Blog oluşturma formu
    public function create()
    {
        return view('admin.blog.create');
    }

    // 🔒 Admin – Yeni blog kaydet
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog başarıyla eklendi!');
    }

    // 🔒 Admin – Blog düzenleme formu
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    // 🔒 Admin – Blog güncelle
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog başarıyla güncellendi!');
    }

    // 🔒 Admin – Blog sil
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog başarıyla silindi!');
    }

    // 🔒 Admin – Blog detay
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    // ✅ API – Tüm blogları JSON olarak getir
    public function apiIndex()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return response()->json($blogs);
    }

    // ✅ API – Belirli blogun detayını JSON olarak getir
    public function apiShow($id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog);
    }
}
