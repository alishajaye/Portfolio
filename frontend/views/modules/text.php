<?php
$data = $args['data'];
?>

<section data-module="text">
  <div class="inner">
    <?php if (!empty($data['title'])) : ?>
      <h2 class="title"><?= esc_html($data['title']) ?></h2>
    <?php endif; ?>
    <div class="text"><?= wp_kses_post(wpautop($data['text'])) ?></div>
  </div>
</section>
