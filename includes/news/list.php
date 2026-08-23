<section class="news-page">
  <div class="container">
    <div class="section-head">
      <h1><?= e(ecomeken_t($t, 'news.section_title')) ?></h1>
      <p><?= e(ecomeken_t($t, 'news.section_subtitle')) ?></p>
    </div>

    <?php if (empty($news)): ?>
      <p class="news-empty"><?= e(ecomeken_t($t, 'news.empty')) ?></p>
    <?php else: ?>
      <div class="news-grid">
        <?php foreach ($news as $item): $a = $item[$lang]; ?>
          <a class="news-card" href="<?= e(ecomeken_lang_url($lang, 'news/' . $item['slug'])) ?>">
            <span class="news-date"><?= e(ecomeken_format_date($item['date'], $lang)) ?></span>
            <h2><?= e($a['title']) ?></h2>
            <p class="desc"><?= e($a['summary']) ?></p>
            <span class="news-readmore"><?= e(ecomeken_t($t, 'news.read_more')) ?> <?= ecomeken_icon('arrow', 16) ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
