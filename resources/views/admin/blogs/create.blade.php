<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Blog Ekle - Admin Panel</title>
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
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-header {
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: #666;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 200px;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            text-align: center;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .error-message {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #fcc;
        }
        
        .character-count {
            font-size: 12px;
            color: #666;
            text-align: right;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="admin-nav">
            <h1>Yeni Blog Ekle</h1>
            <div class="nav-links">
                <a href="{{ route('admin.dashboard') }}">← Blog Listesi</a>
                <a href="{{ route('home') }}">Siteyi Görüntüle</a>
                <a href="{{ route('admin.logout') }}">Çıkış Yap</a>
            </div>
        </nav>
    </header>
    
    <div class="admin-container">
        <div class="form-container">
            <div class="form-header">
                <h2>Yeni Blog Yazısı</h2>
                <p>Aşağıdaki formu doldurarak yeni bir blog yazısı ekleyebilirsiniz.</p>
            </div>
            
            @if($errors->any())
                <div class="error-message">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.blogs.store') }}">
                @csrf
                
                <div class="form-group">
                    <label for="title">Başlık *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="255">
                </div>
                
                <div class="form-group">
                    <label for="category">Kategori *</label>
                    <select id="category" name="category" required>
                        <option value="">Kategori Seçin</option>
                        <option value="Teknoloji" {{ old('category') == 'Teknoloji' ? 'selected' : '' }}>Teknoloji</option>
                        <option value="Web Geliştirme" {{ old('category') == 'Web Geliştirme' ? 'selected' : '' }}>Web Geliştirme</option>
                        <option value="PHP" {{ old('category') == 'PHP' ? 'selected' : '' }}>PHP</option>
                        <option value="Laravel" {{ old('category') == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                        <option value="JavaScript" {{ old('category') == 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                        <option value="CSS" {{ old('category') == 'CSS' ? 'selected' : '' }}>CSS</option>
                        <option value="Veritabanı" {{ old('category') == 'Veritabanı' ? 'selected' : '' }}>Veritabanı</option>
                        <option value="Kişisel" {{ old('category') == 'Kişisel' ? 'selected' : '' }}>Kişisel</option>
                        <option value="Diğer" {{ old('category') == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="content">İçerik *</label>
                    <textarea id="content" name="content" required maxlength="10000" placeholder="Blog yazınızın içeriğini buraya yazın...">{{ old('content') }}</textarea>
                    <div class="character-count">
                        <span id="char-count">0</span> / 10.000 karakter
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tags">Etiketler</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}" placeholder="php, laravel, web geliştirme (virgülle ayırın)" maxlength="500">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Blog Yazısını Kaydet</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">İptal</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Karakter sayacı
        const contentTextarea = document.getElementById('content');
        const charCount = document.getElementById('char-count');
        
        function updateCharCount() {
            const count = contentTextarea.value.length;
            charCount.textContent = count.toLocaleString('tr-TR');
            
            if (count > 9500) {
                charCount.style.color = '#e74c3c';
            } else if (count > 8000) {
                charCount.style.color = '#f39c12';
            } else {
                charCount.style.color = '#666';
            }
        }
        
        contentTextarea.addEventListener('input', updateCharCount);
        updateCharCount(); // Sayfa yüklendiğinde çalıştır
        
        // Form doğrulama
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const category = document.getElementById('category').value;
            const content = document.getElementById('content').value.trim();
            
            if (!title || !category || !content) {
                e.preventDefault();
                alert('Lütfen tüm gerekli alanları doldurun.');
                return false;
            }
            
            if (content.length < 50) {
                e.preventDefault();
                alert('İçerik en az 50 karakter olmalıdır.');
                return false;
            }
        });
    </script>
</body>
</html>
