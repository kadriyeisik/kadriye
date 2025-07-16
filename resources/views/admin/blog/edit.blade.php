{{-- resources/views/admin/blog/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Blog Yazısını Düzenle')

@section('content')
<div class="container mt-4">
    <h2>Blog Yazısını Düzenle</h2>

    {{-- Hata mesajları --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Başlık --}}
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        {{-- İçerik --}}
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Kategori Seçiniz</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Yayın Tarihi --}}
        <div class="mb-3">
            <label for="published_at" class="form-label">Yayın Tarihi</label>
            <input type="date" name="published_at" id="published_at" class="form-control"
                value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}">
        </div>

        {{-- Yazar --}}
        <div class="mb-3">
            <label for="author" class="form-label">Yazar</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $blog->author) }}">
        </div>

        {{-- Resim Yükleme --}}
        <div class="mb-3">
            <label for="image" class="form-label">Kapak Resmi</label>
            @if ($blog->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Kapak Resmi" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        {{-- Durum --}}
        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input"
                {{ old('status', $blog->status) ? 'checked' : '' }}>
            <label for="status" class="form-check-label">Aktif</label>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">İptal</a>
    </form>
</div>
@endsection
