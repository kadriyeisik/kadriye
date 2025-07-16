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
        
        .slider-container {
            width: 80%;
            margin: 2rem auto;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }
        
        .slider {
            display: flex;
            transition: transform 0.5s ease;
            width: 100%;
        }
        
        .slider img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            flex-shrink: 0;
        }
        
        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            transform: translateY(-50%);
        }
        
        .slider-btn {
            background: rgba(216, 164, 143, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.2rem;
        }
        
        .slider-btn:hover {
            background: var(--accent);
        }
        
        header {
            background: var(--cream-dark);
            padding: 2rem 5%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
        }
        
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        .logo-link:hover {
            transform: translateY(-5px);
        }
        
        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 1rem;
            border: 3px solid var(--accent);
        }
        
        .logo-text {
            font-size: 2rem;
            font-weight: 600;
        }
        
        nav {
            background: var(--cream-dark);
            padding: 1rem 5%;
            box-shadow: var(--shadow);
        }
        
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
        }
        
        nav li {
            margin: 0 1rem;
        }
        
        .nav-link {
            color: var(--text-dark);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: var(--transition);
            font-weight: 500;
        }
        
        .nav-link:hover, .nav-link.active {
            background: var(--accent);
            color: white;
        }
        
        #content-area {
            padding: 2rem 5%;
            min-height: 60vh;
        }
        
        .content-section {
            display: none;
            animation: fadeIn 0.5s;
            background: var(--cream-dark);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }
        
        .active-content {
            display: block;
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 6px;
            top: 0;
            height: 100%;
            width: 2px;
            background: var(--accent);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            padding-left: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -4px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent);
        }
        
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
        }
        
        .tech-item {
            background: var(--accent);
            color: white;
            padding: 1rem;
            text-align: center;
            border-radius: 8px;
            transition: var(--transition);
        }
        
        .tech-item:hover {
            transform: translateY(-5px);
        }
        
        .blog-post {
            background: var(--cream-light);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            padding: 1.5rem;
            border: 1px solid var(--accent);
        }
        
        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .blog-meta {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .blog-content {
            margin-bottom: 1rem;
        }
        
        .read-more {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 2px solid var(--accent);
            border-radius: 20px;
            transition: var(--transition);
            display: inline-block;
        }
        
        .read-more:hover {
            background: var(--accent);
            color: white;
        }
        
        .contact-info {
            text-align: center;
            padding: 2rem;
        }
        
        .contact-info h1 {
            margin-bottom: 1.5rem;
        }
        
        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .social-media {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .social-icon {
            font-size: 2rem;
            color: var(--accent);
            transition: var(--transition);
        }
        
        .social-icon:hover {
            transform: translateY(-5px);
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            background: var(--cream-dark);
            margin-top: 2rem;
        }
        
        .social-links {
            margin-bottom: 1rem;
        }
        
        .social-links a {
            color: var(--text-dark);
            font-size: 1.5rem;
            margin: 0 10px;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            color: var(--accent);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            nav li {
                margin: 0.5rem 0;
            }
            .tech-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            header {
                flex-direction: column;
                text-align: center;
            }
            .logo {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            .slider img {
                height: 250px;
            }
            .contact-details {
                align-items: center;
            }
            .language-selector {
                right: 20px;
                top: 80px;
            }
        }
    </style>
</head>
<body class="light-theme">
    <button id="theme-toggle" aria-label="Toggle theme">
        <i class="fas fa-moon"></i>
    </button>
    
    <select id="language-selector" class="language-selector">
        <option value="tr">Türkçe</option>
        <option value="en">English</option>
    </select>
    
    <header>
        <a href="#" class="logo-link" id="home-link">
            <img src="{{ asset('image/benlogo.jpg') }}" alt="Kadriye Işık" class="logo">
            <span class="logo-text">Kadriye Işık</span>
        </a>
    </header>
    
    <nav>
        <ul>
            <li><a href="#" data-target="anasayfa" class="nav-link active" data-i18n="home">Anasayfa</a></li>
            <li><a href="#" data-target="hakkimda" class="nav-link" data-i18n="about">Hakkımda</a></li>
            <li><a href="#" data-target="egitim" class="nav-link" data-i18n="education">Eğitim</a></li>
            <li><a href="#" data-target="teknolojiler" class="nav-link" data-i18n="technologies">Teknolojiler</a></li>
            <li><a href="#" data-target="blog" class="nav-link" data-i18n="blog">Blog</a></li>
            <li><a href="#" data-target="iletisim" class="nav-link" data-i18n="contact">İletişim</a></li>
        </ul>
    </nav>
    
    <main id="content-area">
        <!-- Ana Sayfa -->
        <section id="anasayfa-content" class="content-section active-content">
            <div class="slider-container">
                <div class="slider">
                    <img src="{{ asset('image/bilgisayar.jpg') }}" alt="Proje 1">
                    <img src="{{ asset('image/bilgisayar1.jpg') }}" alt="Proje 2">
                    <img src="{{ asset('image/bilgisayar2.jpg') }}" alt="Proje 3">
                    <img src="{{ asset('image/bilgisayar3.jpg') }}" alt="Proje 4">
                    <img src="{{ asset('image/bilgisayar4.jpg') }}" alt="Proje 5">
                    <img src="{{ asset('image/bilgisayar5.jpg') }}" alt="Proje 6">
                    <img src="{{ asset('image/bilgisayar6.jpg') }}" alt="Proje 7">
                </div>
                <div class="slider-controls">
                    <button class="slider-btn" id="prev-slide"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-btn" id="next-slide"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </section>
        
        <!-- Hakkımda -->
        <section id="hakkimda-content" class="content-section">
            <h1><i class="fas fa-user"></i> <span data-i18n="about_title">Hakkımda</span></h1>
            <div class="about-content">
                <p data-i18n="about_paragraph1">Merhaba, ben Darıca Fen Lisesi mezunu ve Alanya Üniversitesi İngilizce Bilgisayar Mühendisliği 3. sınıf öğrencisiyim. Yazılım geliştirme alanına duyduğum ilgi sayesinde hem teorik hem de pratik becerilerimi sürekli olarak geliştirmeye odaklanmış durumdayım.</p>
                
                <p data-i18n="about_paragraph2">2025 yaz döneminde Onaymatik firmasında staj yaparak sektörel deneyim kazanmakta, aynı zamanda yazılım geliştirme süreçlerini profesyonel ortamda gözlemleme ve katkı sunma imkânı bulmaktayım. Java, Python ve JavaScript gibi programlama dillerine hâkimiyetimin yanı sıra, web geliştirme alanında HTML ve CSS gibi teknolojiler üzerine de aktif olarak çalışmakta ve kendimi bu alanda geliştirmekteyim.</p>
                
                <p data-i18n="about_paragraph3">Akademik bilgi birikimimi gerçek dünya projeleriyle pekiştirmek, ekip çalışmasına yatkınlık kazanmak ve yazılım mühendisliği alanında derinleşmek amacıyla disiplinli bir öğrenme süreci yürütüyorum. Gelecekte tam donanımlı bir yazılım geliştirici olarak teknolojinin insan yaşamına katkıda bulunduğu projelerde yer almayı hedefliyorum.</p>
                
                <p data-i18n="about_paragraph4">İleri düzeyde İngilizce, orta düzeyde ise Almanca bilmekteyim. Bu sayede hem akademik kaynaklara erişimim genişliyor hem de uluslararası çalışma ortamlarında etkin iletişim kurabiliyorum.</p>
            </div>
        </section>
        
        <!-- Eğitim -->
        <section id="egitim-content" class="content-section">
            <h1><i class="fas fa-graduation-cap"></i> <span data-i18n="education_title">Eğitim</span></h1>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h3 data-i18n="high_school">Darıca Fen Lisesi</h3>
                        <p class="timeline-date">2017 - 2021</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h3 data-i18n="university">Alanya Üniversitesi</h3>
                        <p class="timeline-date" data-i18n="university_desc">İngilizce Bilgisayar Mühendisliği (2022 - 2027 Beklenen Mezuniyet)</p>
                    </div>
                </div>
            </div>    
            
            <h2><i class="fas fa-certificate"></i> <span data-i18n="certificates">Sertifikalar</span></h2>
            <ul class="certificates">
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert1">Udemy: Modern JavaScript (2023)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert2">Udemy: React ile Frontend Geliştirme (2023)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert3">Udemy: Java ile OOP (2024)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert4">Udemy: PHP ile Backend (2024)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert5">Udemy: HTML/CSS Masterclass (2022)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert6">Udemy: Python for Beginners (2023)</span></li>
                <li><i class="fas fa-check-circle"></i> <span data-i18n="cert7">Udemy: SQL Veritabanı Yönetimi (2024)</span></li>
            </ul>
        </section>
        
        <!-- Teknolojiler -->
        <section id="teknolojiler-content" class="content-section">
            <h1><i class="fas fa-code"></i> <span data-i18n="technologies_title">Teknolojiler</span></h1>
            <div class="tech-grid">
                <div class="tech-item">
                    <i class="fab fa-html5"></i>
                    <span>HTML</span>
                </div>
                <div class="tech-item">
                    <i class="fab fa-css3-alt"></i>
                    <span>CSS</span>
                </div>
                <div class="tech-item">
                    <i class="fab fa-js"></i>
                    <span>JavaScript</span>
                </div>
                <div class="tech-item">
                    <i class="fab fa-php"></i>
                    <span>PHP</span>
                </div>
                <div class="tech-item">
                    <i class="fab fa-java"></i>
                    <span>Java</span>
                </div>
                <div class="tech-item">
                    <i class="fab fa-laravel"></i>
                    <span>Laravel</span>
                </div>
            </div>
        </section>
        
        <!-- Blog -->
        <section id="blog-content" class="content-section">
            <h1><i class="fas fa-blog"></i> <span data-i18n="blog_title">Teknik Blog</span></h1>
            <div id="blogList">
                <p>Blog yazıları yükleniyor...</p>
            </div>
        </section>
        
        <!-- İletişim -->
        <section id="iletisim-content" class="content-section">
            <div class="contact-info">
                <h1><i class="fas fa-envelope"></i> <span data-i18n="contact_title">İletişim</span></h1>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>kadriyeisik@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span data-i18n="location">İstanbul, Türkiye</span>
                    </div>
                </div>    
                
                <h2 data-i18n="social_media">Sosyal Medya Hesaplarım</h2>
                <div class="social-media">
                    <a href="https://github.com/kadriyeisik" target="_blank" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://linkedin.com/in/kadriyeisik" target="_blank" class="social-icon">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="mailto:kadriyeisik@gmail.com" class="social-icon">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="social-links">
            <a href="https://github.com/kadriyeisik" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
            <a href="https://linkedin.com/in/kadriyeisik" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="mailto:kadriyeisik@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
        </div>
        <p>© 2025 Kadriye Işık. <span data-i18n="rights">Tüm hakları saklıdır.</span></p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Dil çeviri sistemi
            const translations = {
                tr: {
                    "page_title": "Kadriye Işık | Portfolio",
                    "rights": "Tüm hakları saklıdır",            
                    "home": "Anasayfa",
                    "about": "Hakkımda",
                    "education": "Eğitim",
                    "technologies": "Teknolojiler",
                    "blog": "Blog",
                    "contact": "İletişim",                                    
                    "about_title": "Hakkımda",
                    "about_paragraph1": "Merhaba, ben Darıca Fen Lisesi mezunu ve Alanya Üniversitesi İngilizce Bilgisayar Mühendisliği 3. sınıf öğrencisiyim. Yazılım geliştirme alanına duyduğum ilgi sayesinde hem teorik hem de pratik becerilerimi sürekli olarak geliştirmeye odaklanmış durumdayım.",
                    "about_paragraph2": "2025 yaz döneminde Onaymatik firmasında staj yaparak sektörel deneyim kazanmakta, aynı zamanda yazılım geliştirme süreçlerini profesyonel ortamda gözlemleme ve katkı sunma imkânı bulmaktayım. Java, Python ve JavaScript gibi programlama dillerine hâkimiyetimin yanı sıra, web geliştirme alanında HTML ve CSS gibi teknolojiler üzerine de aktif olarak çalışmakta ve kendimi bu alanda geliştirmekteyim.",
                    "about_paragraph3": "Akademik bilgi birikimimi gerçek dünya projeleriyle pekiştirmek, ekip çalışmasına yatkınlık kazanmak ve yazılım mühendisliği alanında derinleşmek amacıyla disiplinli bir öğrenme süreci yürütüyorum. Gelecekte tam donanımlı bir yazılım geliştirici olarak teknolojinin insan yaşamına katkıda bulunduğu projelerde yer almayı hedefliyorum.",
                    "about_paragraph4": "İleri düzeyde İngilizce, orta düzeyde ise Almanca bilmekteyim. Bu sayede hem akademik kaynaklara erişimim genişliyor hem de uluslararası çalışma ortamlarında etkin iletişim kurabiliyorum.",                
                    "education_title": "Eğitim",
                    "high_school": "Darıca Fen Lisesi",
                    "university": "Alanya Üniversitesi",
                    "university_desc": "İngilizce Bilgisayar Mühendisliği (2022 - 2027 Beklenen Mezuniyet)",
                    "certificates": "Sertifikalar",
                    "cert1": "Udemy: Modern JavaScript (2023)",
                    "cert2": "Udemy: React ile Frontend Geliştirme (2023)",
                    "cert3": "Udemy: Java ile OOP (2024)",
                    "cert4": "Udemy: PHP ile Backend (2024)",
                    "cert5": "Udemy: HTML/CSS Masterclass (2022)",
                    "cert6": "Udemy: Python for Beginners (2023)",
                    "cert7": "Udemy: SQL Veritabanı Yönetimi (2024)",                 
                    "technologies_title": "Teknolojiler",
                    "blog_title": "Teknik Blog",
                    "contact_title": "İletişim",
                    "location": "İstanbul, Türkiye",
                    "social_media": "Sosyal Medya Hesaplarım",
                    "no_blogs": "Henüz blog yazısı bulunmuyor."
                },
                en: {                 
                    "page_title": "Kadriye Işık | Portfolio",
                    "rights": "All rights reserved",                                      
                    "home": "Home",
                    "about": "About",
                    "education": "Education",
                    "technologies": "Technologies",
                    "blog": "Blog",
                    "contact": "Contact",                                      
                    "about_title": "About Me",
                    "about_paragraph1": "Hello, I'm a graduate of Darıca Science High School and a 3rd year Computer Engineering student at Alanya University. My interest in software development has led me to continuously improve both my theoretical and practical skills.",
                    "about_paragraph2": "During the summer of 2025, I gained professional experience through an internship at Onaymatik, where I had the opportunity to observe and contribute to software development processes in a professional environment. While proficient in programming languages like Java, Python, and JavaScript, I'm also actively working on and improving my skills in web development technologies such as HTML and CSS.",
                    "about_paragraph3": "I maintain a disciplined learning process to reinforce my academic knowledge with real-world projects, develop teamwork skills, and deepen my expertise in software engineering. My goal is to participate in projects where technology contributes to improving human lives as a fully-equipped software developer.",
                    "about_paragraph4": "I'm fluent in English and have intermediate German skills. This allows me to access a wide range of academic resources and communicate effectively in international work environments.",
                    "education_title": "Education",
                    "high_school": "Darıca Science High School",
                    "university": "Alanya University",
                    "university_desc": "English Computer Engineering (Expected Graduation: 2022 - 2027)",
                    "certificates": "Certificates",
                    "cert1": "Udemy: Modern JavaScript (2023)",
                    "cert2": "Udemy: Frontend Development with React (2023)",
                    "cert3": "Udemy: OOP with Java (2024)",
                    "cert4": "Udemy: Backend with PHP (2024)",
                    "cert5": "Udemy: HTML/CSS Masterclass (2022)",
                    "cert6": "Udemy: Python for Beginners (2023)",
                    "cert7": "Udemy: SQL Database Management (2024)",
                    "technologies_title": "Technologies",
                    "blog_title": "Technical Blog",
                    "contact_title": "Contact",
                    "location": "Istanbul, Turkey",
                    "social_media": "My Social Media Accounts",
                    "no_blogs": "No blog posts available yet."
                }
            };

            // Dil değiştirme fonksiyonu
            function changeLanguage(lang) {
                $('html').attr('lang', lang);
                $('[data-i18n]').each(function() {
                    const key = $(this).data('i18n');
                    $(this).text(translations[lang][key] || key);
                });
                document.title = translations[lang]['page_title'];
                localStorage.setItem('language', lang);
            }

            // Dil seçici
            $('#language-selector').change(function() {
                const selectedLang = $(this).val();
                changeLanguage(selectedLang);
            });

            // Kaydedilmiş dil tercihi
            const savedLang = localStorage.getItem('language') || 'tr';
            $('#language-selector').val(savedLang);
            changeLanguage(savedLang);

            // Slider fonksiyonları
            let currentSlide = 0;
            const slides = $('.slider img');
            const totalSlides = slides.length;

            function showSlide(index) {
                if (index >= totalSlides) currentSlide = 0;
                else if (index < 0) currentSlide = totalSlides - 1;
                else currentSlide = index;
                
                const translateX = -currentSlide * 100;
                $('.slider').css('transform', `translateX(${translateX}%)`);
            }

            $('#next-slide').click(function() {
                showSlide(currentSlide + 1);
            });

            $('#prev-slide').click(function() {
                showSlide(currentSlide - 1);
            });

            // Otomatik slider
            setInterval(function() {
                showSlide(currentSlide + 1);
            }, 5000);

            // Tema değiştirici
            $('#theme-toggle').click(function() {
                $('body').toggleClass('dark-theme');
                const icon = $(this).find('i');
                if ($('body').hasClass('dark-theme')) {
                    icon.removeClass('fa-moon').addClass('fa-sun');
                    localStorage.setItem('theme', 'dark');
                } else {
                    icon.removeClass('fa-sun').addClass('fa-moon');
                    localStorage.setItem('theme', 'light');
                }
            });

            // Kaydedilmiş tema tercihi
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                $('body').addClass('dark-theme');
                $('#theme-toggle i').removeClass('fa-moon').addClass('fa-sun');
            }

            // Navigasyon
            $('.nav-link').click(function(e) {
                e.preventDefault();
                
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
                
                $('.content-section').removeClass('active-content');
                const target = $(this).data('target');
                $(`#${target}-content`).addClass('active-content');
            });

            // Home logo link
            $('#home-link').click(function(e) {
                e.preventDefault();
                $('.nav-link').removeClass('active');
                $('.nav-link[data-target="anasayfa"]').addClass('active');
                $('.content-section').removeClass('active-content');
                $('#anasayfa-content').addClass('active-content');
            });

            // Blog verilerini Laravel API'den çek
            function loadBlogs() {
                $.ajax({
                    url: '/api/blogs',
                    type: 'GET',
                    dataType: 'json',
                    success: function(blogs) {
                        let blogHtml = '';
                        if (blogs.length === 0) {
                            const currentLang = $('#language-selector').val();
                            const noBlogs = translations[currentLang]['no_blogs'];
                            blogHtml = `<p class="no-blogs">${noBlogs}</p>`;
                        } else {
                            blogs.forEach(function(blog) {
                                const date = new Date(blog.created_at).toLocaleDateString('tr-TR');
                                blogHtml += `
                                    <div class="blog-post">
                                        <h3>${blog.title}</h3>
                                        <p class="blog-meta">
                                            <i class="fas fa-user"></i> ${blog.author} • 
                                            <i class="fas fa-calendar"></i> ${date}
                                        </p>
                                        <div class="blog-content">
                                            ${blog.content.substring(0, 200)}...
                                        </div>
                                        <a href="/blog/${blog.id}" class="read-more">Devamını Oku</a>
                                    </div>
                                `;
                            });
                        }
                        $('#blogList').html(blogHtml);
                    },
                    error: function() {
                        $('#blogList').html('<p class="error">Blog yazıları yüklenirken bir hata oluştu.</p>');
                    }
                });
            }

            // Sayfa yüklendiğinde blogları yükle
            loadBlogs();
        });
    </script>
</body>
</html>
