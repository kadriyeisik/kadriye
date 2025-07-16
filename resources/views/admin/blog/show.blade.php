<!-- resources/views/blog/show.blade.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>{{ $blog->title }} | Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">
    <div class="container">
        <a href="{{ url('/') }}" class="btn btn-secondary mb-3">⬅️ Anasayfa</a>

        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title">{{ $blog->title }}</h1>
                <p class="text-muted">Yazar: {{ $blog->author }} | Tarih: {{ $blog->created_at->format('d.m.Y') }}</p>
                <hr>
                <p class="card-text">{!! nl2br(e($blog->content)) !!}</p>
            </div>
        </div>
    </div>
</body>
</html>
