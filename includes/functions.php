<?php
/**
 * Core helpers: language detection, translation lookup, small utilities.
 * No framework, no Composer — plain PHP arrays for i18n, per the agreed approach.
 */

define('ECOMEKEN_LANGS', ['en', 'ru', 'kk']);
define('ECOMEKEN_DEFAULT_LANG', 'ru');

/**
 * Work out which language to serve.
 * Priority: explicit ?lang / path segment already resolved by .htaccess into
 * $_GET['lang'] -> cookie from a previous visit -> browser Accept-Language -> default.
 */
function ecomeken_detect_lang(): string
{
    if (!empty($_GET['lang']) && in_array($_GET['lang'], ECOMEKEN_LANGS, true)) {
        return $_GET['lang'];
    }

    if (!empty($_COOKIE['ecomeken_lang']) && in_array($_COOKIE['ecomeken_lang'], ECOMEKEN_LANGS, true)) {
        return $_COOKIE['ecomeken_lang'];
    }

    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    foreach (ECOMEKEN_LANGS as $lang) {
        if (stripos($accept, $lang) !== false) {
            return $lang;
        }
    }

    return ECOMEKEN_DEFAULT_LANG;
}

/**
 * Load the translation array for a given language, with a safe fallback
 * to the default language if a key/file goes missing.
 */
function ecomeken_load_lang(string $lang): array
{
    if (!in_array($lang, ECOMEKEN_LANGS, true)) {
        $lang = ECOMEKEN_DEFAULT_LANG;
    }

    $path = __DIR__ . '/../lang/' . $lang . '.php';
    if (!is_file($path)) {
        $path = __DIR__ . '/../lang/' . ECOMEKEN_DEFAULT_LANG . '.php';
    }

    return require $path;
}

/**
 * Dot-notation lookup into the translation array, e.g. t($t, 'nav.services').
 * Falls back to the key itself so missing strings are visible instead of blank.
 */
function ecomeken_t(array $t, string $key)
{
    $segments = explode('.', $key);
    $value = $t;
    foreach ($segments as $segment) {
        if (is_array($value) && array_key_exists($segment, $value)) {
            $value = $value[$segment];
        } else {
            return $key;
        }
    }
    return $value;
}

/** Build a link to another language's version of the current page. */
function ecomeken_lang_url(string $lang, string $page = ''): string
{
    $page = trim($page, '/');
    return '/' . $lang . ($page !== '' ? '/' . $page : '/');
}

/** Escape helper to keep templates readable. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/** Web path to the brand mark, or null to fall back to the text-only wordmark. */
function ecomeken_logo_path(): ?string
{
    foreach (['logo.png', 'logo.svg', 'logo.webp'] as $candidate) {
        if (is_file(__DIR__ . '/../assets/img/' . $candidate)) {
            return 'assets/img/' . $candidate;
        }
    }
    return null;
}
