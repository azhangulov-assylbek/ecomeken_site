<?php
/** Expects $lang and $t to already be set. */
$year = date('Y');
$logoFile = ecomeken_logo_path();
$homeUrl = ecomeken_lang_url($lang);
?>
<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <div class="brand" style="margin-bottom:8px;">
        <?php if ($logoFile): ?>
          <img src="/<?= e($logoFile) ?>" alt="ECOMEKEN">
        <?php else: ?>
          <span class="brand-mark">E</span>
        <?php endif; ?>
        <span>ECOMEKEN</span>
      </div>
      <p class="footer-copy" style="margin:0;"><?= e(ecomeken_t($t, 'footer.tagline')) ?></p>
    </div>
    <nav class="footer-links">
      <a href="<?= e($homeUrl) ?>#services"><?= e(ecomeken_t($t, 'nav.services')) ?></a>
      <a href="<?= e($homeUrl) ?>#approach"><?= e(ecomeken_t($t, 'nav.approach')) ?></a>
      <a href="<?= e($homeUrl) ?>#projects"><?= e(ecomeken_t($t, 'nav.projects')) ?></a>
      <a href="<?= e(ecomeken_lang_url($lang, 'news')) ?>"><?= e(ecomeken_t($t, 'nav.news')) ?></a>
      <a href="<?= e($homeUrl) ?>#contact"><?= e(ecomeken_t($t, 'nav.contact')) ?></a>
    </nav>
    <p class="footer-copy" style="margin:0;"><?= e(str_replace('{year}', (string)$year, ecomeken_t($t, 'footer.rights'))) ?></p>
  </div>
</footer>
<script src="/assets/js/main.js"></script>
</body>
</html>
