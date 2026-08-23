<?php
require_once __DIR__ . '/includes/functions.php';

$slugParam = isset($_GET['slug']) ? preg_replace('/[^a-z0-9-]/', '', (string)$_GET['slug']) : null;

if (empty($_GET['lang'])) {
    $detected = ecomeken_detect_lang();
    $target = ecomeken_lang_url($detected, 'news' . ($slugParam ? '/' . $slugParam : ''));
    header('Location: ' . $target, true, 302);
    exit;
}

$lang = in_array($_GET['lang'], ECOMEKEN_LANGS, true) ? $_GET['lang'] : ECOMEKEN_DEFAULT_LANG;
setcookie('ecomeken_lang', $lang, time() + 60 * 60 * 24 * 180, '/');

$t = ecomeken_load_lang($lang);
$news = ecomeken_load_news();

$article = null;
if ($slugParam !== null) {
    foreach ($news as $item) {
        if ($item['slug'] === $slugParam) {
            $article = $item;
            break;
        }
    }
}

$currentPage = $slugParam ? 'news/' . $slugParam : 'news';

if ($article) {
    $pageTitle = ecomeken_t($article[$lang], 'title') . ' — ECOMEKEN';
    $pageDescription = ecomeken_t($article[$lang], 'summary');
} else {
    $pageTitle = ecomeken_t($t, 'news.section_title') . ' — ECOMEKEN';
    $pageDescription = ecomeken_t($t, 'news.section_subtitle');
}

require __DIR__ . '/includes/header.php';

if ($slugParam !== null) {
    require __DIR__ . '/includes/news/article.php';
} else {
    require __DIR__ . '/includes/news/list.php';
}

require __DIR__ . '/includes/footer.php';
