<?php
$data = $args['data'];
?>

<section data-module="hero_default">
  <div class="content">
    <h1 class="title"><?= esc_html($data['title']) ?></h1>
    <?php if (!empty($data['subline'])) : ?>
      <p class="subline"><?= esc_html($data['subline']) ?></p>
    <?php endif; ?>
  </div>
</section>
