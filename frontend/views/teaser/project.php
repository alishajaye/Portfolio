<?php
$id = $args["id"];
$project = get_project_by_id($id);

$terms = get_the_terms($id, 'project_category');
$label = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
?>

<a class="project" href="<?= esc_url($project["link"]) ?>" target="_self">
  <div class="media">
    <img src="<?= esc_url($project["image"]["src"]) ?>" alt="<?= esc_attr($project["image"]["alt"]) ?>">
    <?php if ($label) : ?>
      <span class="label"><?= esc_html($label) ?></span>
    <?php endif; ?>
  </div>
  <h3 class="project-title"><?= esc_html($project["title"]) ?></h3>
  <p class="project-text"><?= esc_html($project["description"]) ?></p>
</a>

<div class="media">
  <?php if (!empty($project["image"]["src"])) : ?>
    <img src="<?= esc_url($project["image"]["src"]) ?>" alt="<?= esc_attr($project["image"]["alt"]) ?>">
  <?php endif; ?>
  <?php if ($label) : ?>
    <span class="label"><?= esc_html($label) ?></span>
  <?php endif; ?>
</div>
