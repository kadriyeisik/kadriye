<?php
// router.php - Laravel routing için
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Statik dosyalar için
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

// Admin paneli route'ları
if (strpos($uri, '/admin') === 0) {
    $_SERVER['REQUEST_URI'] = $uri;
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    require_once __DIR__ . '/public/index.php';
    return true;
}

// Diğer tüm route'lar
require_once __DIR__ . '/public/index.php';
