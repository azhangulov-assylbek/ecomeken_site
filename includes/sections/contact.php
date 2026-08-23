<?php
$sent = $_GET['sent'] ?? null; // 'ok' | 'error' | null, set by contact.php after submit
?>
<section class="contact" id="contact">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-info">
        <h2><?= e(ecomeken_t($t, 'contact.title')) ?></h2>
        <p class="lede"><?= e(ecomeken_t($t, 'contact.subtitle')) ?></p>

        <div class="contact-detail">
          <span class="icon"><?= ecomeken_icon('mail', 18) ?></span>
          <div>
            <span class="label"><?= e(ecomeken_t($t, 'contact.email_label')) ?></span>
            <a class="value" href="mailto:info@ecomeken.kz">info@ecomeken.kz</a>
          </div>
        </div>

        <div class="contact-detail">
          <span class="icon"><?= ecomeken_icon('phone', 18) ?></span>
          <div>
            <span class="label"><?= e(ecomeken_t($t, 'contact.phone_label')) ?></span>
            <a class="value" href="tel:+77085115249">+7 708 511 5249</a>
          </div>
        </div>

        <div class="contact-detail">
          <span class="icon"><?= ecomeken_icon('linkedin', 18) ?></span>
          <div>
            <span class="label"><?= e(ecomeken_t($t, 'contact.linkedin_label')) ?></span>
            <span class="value placeholder"><?= e(ecomeken_t($t, 'contact.linkedin_placeholder')) ?></span>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <?php if ($sent === 'ok'): ?>
          <div class="form-alert success"><?= e(ecomeken_t($t, 'contact.form.success')) ?></div>
        <?php elseif ($sent === 'error'): ?>
          <div class="form-alert error"><?= e(ecomeken_t($t, 'contact.form.error')) ?></div>
        <?php endif; ?>

        <form action="/contact.php" method="post">
          <input type="hidden" name="lang" value="<?= e($lang) ?>">
          <!-- honeypot: real visitors never fill this in -->
          <div class="form-note">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </div>

          <div class="form-field">
            <label for="name"><?= e(ecomeken_t($t, 'contact.form.name')) ?></label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-field">
            <label for="email"><?= e(ecomeken_t($t, 'contact.form.email')) ?></label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-field">
            <label for="message"><?= e(ecomeken_t($t, 'contact.form.message')) ?></label>
            <textarea id="message" name="message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%;"><?= e(ecomeken_t($t, 'contact.form.submit')) ?></button>
        </form>
      </div>
    </div>
  </div>
</section>
