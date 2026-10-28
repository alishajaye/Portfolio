<?php
$data = $args['data'];
$project_ids = get_project_ids();
$categories = get_terms([
  'taxonomy'   => 'project_category',
  'hide_empty' => true,
]);
?>

<section data-module="projects">
  <div class="header">
    <h1 class="title"><?= esc_html($data["title"]) ?></h1>

    <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
      <div class="filter" role="group" aria-label="Projekte nach Kategorie filtern">
        <button type="button" class="filter__button" data-filter="all" aria-pressed="true">Alle</button>

        <?php foreach (array_values($categories) as $index => $category) : ?>
          <button
            type="button"
            class="filter__button"
            data-filter="<?= esc_attr($category->slug) ?>"
            aria-pressed="false"
          ><?= esc_html($category->name) ?></button>

          <?php if ($index === 1) : ?>
            <span class="filter__break" aria-hidden="true"></span>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if (!empty($project_ids)) : ?>
    <div class="projects">
      <?php foreach ($project_ids as $project_id) : ?>
        <?php
        get_template_part(
          "frontend/views/teaser/project",
          null,
          [
            "id" => $project_id
          ]
        );
        ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>
