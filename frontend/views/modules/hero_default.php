<?php
$data = $args['data'];

$button_url   = !empty($data['button_file']) ? wp_get_attachment_url((int) $data['button_file']) : '';
$button_label = !empty($data['button_label']) ? $data['button_label'] : 'Herunterladen';

$back_url   = !empty($data['back_url']) ? $data['back_url'] : ''; 
$back_label = !empty($data['back_label']) ? $data['back_label'] : '← Alle Projekte';
?>

<section data-module="hero_default">
  <!-- Der Zurück-Button wird nur gerendert, wenn eine URL vorhanden ist -->
  <?php if ($back_url) : ?>
    <a class="button-back" href="<?= esc_url($back_url) ?>"><?= esc_html($back_label) ?></a>
  <?php endif; ?>

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
