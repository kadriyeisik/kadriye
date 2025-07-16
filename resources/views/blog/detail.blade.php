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
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 2px solid var(--accent);
            border-radius: 20px;
            transition: var(--transition);
            margin-bottom: 2rem;
        }
        
        .back-btn:hover {
            background: var(--accent);
            color: white;
        }
        
        .blog-article {
            background: var(--cream-dark);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }
        
        .blog-title {
            color: var(--text-dark);
            margin-bottom: 1rem;
            font-size: 2rem;
        }
        
        .blog-meta {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent);
        }
        
        .blog-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        .blog-content p {
            margin-bottom: 1.5rem;
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            background: var(--cream-dark);
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .blog-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Ana Sayfaya Dön
        </a>
        
        <article class="blog-article">
            <h1 class="blog-title">{{ $blog->title }}</h1>
            
            <div class="blog-meta">
                <i class="fas fa-user"></i> {{ $blog->author }} • 
                <i class="fas fa-calendar"></i> {{ $blog->created_at->format('d.m.Y') }}
            </div>
            
            <div class="blog-content">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </article>
    </div>
    
    <footer>
        <p>© 2025 Kadriye Işık. Tüm hakları saklıdır.</p>
    </footer>
</body>
</html>
