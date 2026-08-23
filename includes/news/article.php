<section class="news-page">
  <div class="container">
    <a class="back-link" href="<?= e(ecomeken_lang_url($lang, 'news')) ?>"><?= e(ecomeken_t($t, 'news.back_to_list')) ?></a>

    <?php if (!$article): ?>
      <p class="news-empty"><?= e(ecomeken_t($t, 'news.not_found')) ?></p>
    <?php else: $a = $article[$lang]; ?>
      <article class="news-article">
        <span class="news-date"><?= e(ecomeken_format_date($article['date'], $lang)) ?></span>
        <h1><?= e($a['title']) ?></h1>
        <div class="prose">
          <?php foreach (preg_split('/\n\s*\n/', trim($a['body'])) as $para): ?>
            <p><?= e($para) ?></p>
          <?php endforeach; ?>
        </div>
        <?php if (!empty($article['source']['url'])): ?>
          <p class="news-source">
            <?= e(ecomeken_t($t, 'news.source_label')) ?>:
            <a href="<?= e($article['source']['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($article['source']['label'] ?? $article['source']['url']) ?></a>
          </p>
        <?php endif; ?>
      </article>
    <?php endif; ?>
  </div>
</section>
