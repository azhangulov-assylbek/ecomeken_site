<section class="trust-bar">
  <div class="container">
    <div class="trust-list">
      <?php foreach (ecomeken_t($t, 'trust.items') as $item): ?>
        <div class="trust-item"><?= ecomeken_icon('check', 16) ?><span><?= e($item) ?></span></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
