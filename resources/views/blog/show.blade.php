<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} | Kadriye Işık</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cream-light: #FFF8F0;
            --cream-dark: #F4E3D6;
            --accent: #D8A48F;
            --text-dark: #3D3D3D;
            --text-light: #5E5E5E;
            --shadow: 0 4px 6px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cream-light);
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .blog-title {
            font-size: 2.2rem;
            font-weight: bold;
        }
        .blog-meta {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        .blog-image {
            max-width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        .back-link {
            margin-top: 30px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <h1 class="blog-title">{{ $blog->title }}</h1>
        <div class="blog-meta">
            Yazar: <strong>{{ $blog->author }}</strong> |
            Yayın Tarihi: {{ $blog->created_at->format('d M Y') }}
        </div>

        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" class="blog-image" alt="Kapak Görseli">
        @endif

        <div class="blog-content">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <a href="{{ url('/') }}" class="btn btn-outline-primary back-link">← Ana Sayfaya Dön</a>
    </div>
</body>
</html>
