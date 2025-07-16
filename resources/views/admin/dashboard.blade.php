<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yönetimi - Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            line-height: 1.6;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-nav h1 {
            font-size: 24px;
        }
        
        .admin-nav .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .admin-nav .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .admin-nav .nav-links a:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .admin-actions {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
        }
        
        .btn-danger {
            background: #e74c3c;
            color: white;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .btn-warning {
            background: #f39c12;
            color: white;
        }
        
        .btn-warning:hover {
            background: #d68910;
        }
        
        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .blog-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
        }
        
        .blog-card-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .blog-card-header h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .blog-card-meta {
            color: #666;
            font-size: 12px;
            margin-bottom: 10px;
        }
        
        .blog-card-content {
            padding: 0 20px 20px;
        }
        
        .blog-card-content p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .blog-card-actions {
            display: flex;
            gap: 10px;
        }
        
        .blog-card-actions .btn {
            flex: 1;
            text-align: center;
            font-size: 12px;
            padding: 8px 12px;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .no-blogs {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .no-blogs h3 {
            color: #666;
            margin-bottom: 10px;
        }
        
        .no-blogs p {
            color: #999;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="admin-nav">
            <h1>Blog Yönetimi</h1>
            <div class="nav-links">
                <a href="{{ route('home') }}">Siteyi Görüntüle</a>
                <a href="{{ route('admin.logout') }}">Çıkış Yap</a>
            </div>
        </nav>
    </header>
    
    <div class="admin-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="admin-actions">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ Yeni Blog Ekle</a>
        </div>
        
        @if($blogs->count() > 0)
            <div class="blogs-grid">
                @foreach($blogs as $blog)
                    <div class="blog-card">
                        <div class="blog-card-header">
                            <h3>{{ $blog->title }}</h3>
                            <div class="blog-card-meta">
                                {{ $blog->created_at->format('d.m.Y H:i') }} - {{ $blog->category }}
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <p>{{ Str::limit($blog->content, 150) }}</p>
                            <div class="blog-card-actions">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning">Düzenle</a>
                                <form method="POST" action="{{ route('admin.blogs.destroy', $blog->id) }}" style="display: inline; flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bu blogu silmek istediğinizden emin misiniz?')" style="width: 100%;">Sil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-blogs">
                <h3>Henüz blog yazısı bulunmuyor</h3>
                <p>İlk blog yazınızı eklemek için yukarıdaki "Yeni Blog Ekle" butonunu kullanın.</p>
            </div>
        @endif
    </div>
</body>
</html>
