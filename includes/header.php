<?php
/**
 * Expects $lang and $t (translations array) to already be set by the caller.
 */
require_once __DIR__ . '/icons.php';

$logoFile = ecomeken_logo_path();

$navItems = [
    'services' => '#services',
    'approach' => '#approach',
    'projects' => '#projects',
    'contact'  => '#contact',
];
?>
<!doctype html>
<html lang="<?= e($lang) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e(ecomeken_t($t, 'meta.title')) ?></title>
<meta name="description" content="<?= e(ecomeken_t($t, 'meta.description')) ?>">
<link rel="icon" href="/assets/img/favicon.png" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="bg-texture"></div>
<div class="bg-blob bg-blob--1"></div>
<div class="bg-blob bg-blob--2"></div>
<div class="bg-blob bg-blob--3"></div>

<header class="site-header">
  <div class="container">
    <a href="<?= e(ecomeken_lang_url($lang)) ?>" class="brand">
      <?php if ($logoFile): ?>
        <img src="/<?= e($logoFile) ?>" alt="ECOMEKEN">
      <?php else: ?>
        <span class="brand-mark">E</span>
      <?php endif; ?>
      <span>ECOMEKEN</span>
    </a>

    <nav class="main-nav" id="main-nav">
      <?php foreach ($navItems as $key => $href): ?>
        <a href="<?= e($href) ?>"><?= e(ecomeken_t($t, 'nav.' . $key)) ?></a>
      <?php endforeach; ?>
      <div class="lang-switch">
        <?php foreach (ECOMEKEN_LANGS as $l): ?>
          <a href="<?= e(ecomeken_lang_url($l)) ?>" class="<?= $l === $lang ? 'active' : '' ?>"><?= e(ecomeken_t($t, 'lang_switch.' . $l)) ?></a>
        <?php endforeach; ?>
      </div>
    </nav>

    <div class="header-actions">
      <a href="#contact" class="btn btn-primary btn-sm"><?= e(ecomeken_t($t, 'nav.cta')) ?></a>
      <button class="nav-toggle" id="nav-toggle" aria-label="Menu" aria-expanded="false">
        <?= ecomeken_icon('menu', 20) ?>
      </button>
    </div>
  </div>
</header>
