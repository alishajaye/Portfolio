<?php
$id = $args["id"];
$project = get_project_by_id($id);
$label = $project["project_categories"][0] ?? '';
?>

<a
  class="project"
  href="<?= esc_url($project["link"]) ?>"
  target="_self"
  data-categories="<?= esc_attr(implode(' ', $project["project_category_slugs"])) ?>"
>
  <div class="media">
    <?php if (!empty($project["image"]["src"])) : ?>
      <img src="<?= esc_url($project["image"]["src"]) ?>" alt="<?= esc_attr($project["image"]["alt"]) ?>">
    <?php endif; ?>
    <?php if ($label) : ?>
      <span class="label"><?= esc_html($label) ?></span>
    <?php endif; ?>
  </div>
  <h3 class="project-title"><?= esc_html($project["title"]) ?></h3>
  <p class="project-text"><?= esc_html($project["description"]) ?></p>
</a>
