<!-- resources/views/admin/blog/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Yeni Blog Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">
    <div class="container">
        <h1 class="mb-4 text-center">🆕 Yeni Blog Ekle</h1>

        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary mb-4">← Geri Dön</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Hata!</strong> Lütfen aşağıdaki alanları düzeltin:
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Dosya yükleme için enctype eklendi -->
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Başlık</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">İçerik</label>
                <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Yazar</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}" required>
            </div>

            <!-- 🆕 Resim yükleme alanı -->
            <div class="mb-3">
                <label for="image" class="form-label">Kapak Resmi</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>
</body>
</html>
