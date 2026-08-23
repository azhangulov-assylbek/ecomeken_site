<?php
/** Expects $lang and $t to already be set. */
$year = date('Y');
$logoFile = ecomeken_logo_path();
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
      <a href="#services"><?= e(ecomeken_t($t, 'nav.services')) ?></a>
      <a href="#approach"><?= e(ecomeken_t($t, 'nav.approach')) ?></a>
      <a href="#projects"><?= e(ecomeken_t($t, 'nav.projects')) ?></a>
      <a href="#contact"><?= e(ecomeken_t($t, 'nav.contact')) ?></a>
    </nav>
    <p class="footer-copy" style="margin:0;"><?= e(str_replace('{year}', (string)$year, ecomeken_t($t, 'footer.rights'))) ?></p>
  </div>
</footer>
<script src="/assets/js/main.js"></script>
</body>
</html>
