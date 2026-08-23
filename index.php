<?php
require_once __DIR__ . '/includes/functions.php';

// /en/, /ru/, /kk/ are rewritten to index.php?lang=xx by .htaccess.
// A bare "/" (no lang param) redirects once to the detected language so
// every page has one canonical, bookmarkable URL.
if (empty($_GET['lang'])) {
    $detected = ecomeken_detect_lang();
    header('Location: ' . ecomeken_lang_url($detected), true, 302);
    exit;
}

$lang = in_array($_GET['lang'], ECOMEKEN_LANGS, true) ? $_GET['lang'] : ECOMEKEN_DEFAULT_LANG;
setcookie('ecomeken_lang', $lang, time() + 60 * 60 * 24 * 180, '/');

$t = ecomeken_load_lang($lang);
$services = require __DIR__ . '/data/services.php';
$projects = require __DIR__ . '/data/projects.php';

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sections/hero.php';
require __DIR__ . '/includes/sections/two-directions.php';
require __DIR__ . '/includes/sections/services.php';
require __DIR__ . '/includes/sections/trust.php';
require __DIR__ . '/includes/sections/projects.php';
require __DIR__ . '/includes/sections/contact.php';
require __DIR__ . '/includes/footer.php';
