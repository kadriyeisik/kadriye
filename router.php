<?php
// router.php
if (file_exists(__DIR__ . '/public' . $_SERVER['REQUEST_URI'])) {
    return false; // Gerçek dosya varsa direkt göster
} else {
    require __DIR__ . '/public/index.php'; // Diğer her şeyi Laravel'e gönder
}
