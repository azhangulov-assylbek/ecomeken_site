<section class="services" id="services">
  <div class="container">
    <div class="section-head">
      <h2><?= e(ecomeken_t($t, 'services.section_title')) ?></h2>
      <p><?= e(ecomeken_t($t, 'services.section_subtitle')) ?></p>
    </div>
    <div class="service-grid">
      <?php foreach ($services as $service): $id = $service['id']; ?>
        <div class="service-card">
          <div class="service-icon"><?= ecomeken_icon($service['icon']) ?></div>
          <h3><?= e(ecomeken_t($t, "services.items.$id.title")) ?></h3>
          <p class="desc"><?= e(ecomeken_t($t, "services.items.$id.description")) ?></p>
          <div class="service-meta">
            <span class="duration"><?= e(ecomeken_t($t, "services.items.$id.duration")) ?></span>
            <span class="price"><?= e(ecomeken_t($t, "services.items.$id.price")) ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
