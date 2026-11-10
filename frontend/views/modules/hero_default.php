<?php
$data = $args['data'];

$button_url   = !empty($data['button_file']) ? wp_get_attachment_url((int) $data['button_file']) : '';
$button_label = !empty($data['button_label']) ? $data['button_label'] : 'Herunterladen';
?>

<section data-module="hero_default">
  <div class="content">
    <h1 class="title"><?= esc_html($data['title']) ?></h1>
    <?php if (!empty($data['subline'])) : ?>
      <p class="subline"><?= esc_html($data['subline']) ?></p>
    <?php endif; ?>
  </div>

  <?php if ($button_url) : ?>
    <a class="button" href="<?= esc_url($button_url) ?>" download><?= esc_html($button_label) ?></a>
  <?php endif; ?>
</section>
