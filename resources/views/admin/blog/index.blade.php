<!-- resources/views/admin/blog/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Blog Listesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">
    <div class="container">
        <h1 class="mb-4 text-center">📝 Blog Yönetim Paneli</h1>

        <!-- Arama ve filtreleme -->
        <form method="GET" action="{{ route('admin.blog.index') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Başlık, içerik, yazar ara..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="author" class="form-select">
                    <option value="">Tüm Yazarlar</option>
                    @foreach($authors as $author)
                        <option value="{{ $author }}" {{ request('author') == $author ? 'selected' : '' }}>{{ $author }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Ara</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary w-100">Temizle</a>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-success w-100">Yeni</a>
            </div>
        </form>

        <!-- Başarılı mesajı -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Blog tablosu -->
        <div class="table-responsive bg-white shadow rounded p-3">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Başlık</th>
                        <th>Yazar</th>
                        <th>Tarih</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->created_at->format('d.m.Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-sm btn-info">Göster</a>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Silmek istediğine emin misin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Hiç blog bulunamadı.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
