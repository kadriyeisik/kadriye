<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="page_title">Kadriye Işık | Portfolio</title>
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
        .dark-theme {
            --cream-light: #2D2D2D;
            --cream-dark: #1A1A1A;
            --accent: #D8A48F;
            --text-dark: #F0F0F0;
            --text-light: #CCCCCC;
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        
        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: var(--transition);
            z-index: 1000;
            font-size: 1.2rem;
        }
        
        #theme-toggle:hover {
            transform: scale(1.1);
        }
        
        .language-selector {
            position: fixed;
            top: 20px;
            right: 70px;
            z-index: 1000;
            background: var(--cream-dark);
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid var(--accent);
            color: var(--text-dark);
            cursor: pointer;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cream-light);
            color: var(--text-dark);
            transition: var(--transition);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
      text-align: center;
      padding: 30px;
      background-color: #f9d5e5;
    }

    h1 {
      font-size: 2.5em;
      margin-bottom: 0;
    }

    .blog-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .blog-card {
      background: #ffffff;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-left: 5px solid #f99fc9;
      border-radius: 8px;
    }

    .blog-card h2 {
      margin-top: 0;
    }

    .blog-card a {
      color: #f99fc9;
      text-decoration: none;
    }

    .blog-card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <header>
    <h1>Kadriye'nin Blogu</h1>
    <p>Hayallerim, düşüncelerim ve ben 🍓</p>
  </header>

  <div class="blog-container">
    @foreach ($blogs as $blog)
      <div class="blog-card">
        <h2>{{ $blog->title }}</h2>
        <p>{{ Str::limit($blog->content, 150) }}</p>
        <p><strong>Yazar:</strong> {{ $blog->author }}</p>
        <a href="{{ route('blog.show', $blog->id) }}">Devamını Oku →</a>
      </div>
    @endforeach
  </div>

  <footer>
    <p>© 2025 Kadriye tarafından 💖 ile hazırlandı.</p>
  </footer>

</body>
</html>
