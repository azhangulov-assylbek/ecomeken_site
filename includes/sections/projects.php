<section class="projects" id="projects">
  <div class="container">
    <div class="section-head">
      <h2><?= e(ecomeken_t($t, 'projects.section_title')) ?></h2>
      <p><?= e(ecomeken_t($t, 'projects.section_subtitle')) ?></p>
    </div>
    <div class="project-grid">
      <?php foreach ($projects as $project):
        $id = $project['id'];
        $statusLabel = ecomeken_t($t, 'project_status.' . $project['status']);
        $link = $project['link'];
        $external = $project['external'];
      ?>
        <div class="project-card">
          <div class="project-icon"><?= ecomeken_icon($project['icon']) ?></div>
          <h3><?= e(ecomeken_t($t, "projects.items.$id.title")) ?></h3>
          <p class="desc"><?= e(ecomeken_t($t, "projects.items.$id.description")) ?></p>

          <?php if ($statusLabel !== ''): ?>
            <?php if ($link && !$external): ?>
              <a href="<?= e($link) ?>" class="project-status"><?= e($statusLabel) ?></a>
            <?php else: ?>
              <span class="project-status"><?= e($statusLabel) ?></span>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($link && $external): ?>
            <a href="<?= e($link) ?>" class="project-link" target="_blank" rel="noopener noreferrer">
              <?= e(ecomeken_t($t, 'projects.visit_site')) ?> <?= ecomeken_icon('arrow', 16) ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
