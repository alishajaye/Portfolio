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
      <?php
      // -> Buttons vorbereiten: "Alle" plus alle Kategorien, vier Buttons pro Zeile
      $buttons = array_merge(
        [['slug' => 'all', 'name' => 'Alle', 'pressed' => 'true']],
        array_map(
          fn($category) => [
            'slug'    => $category->slug,
            'name'    => $category->name,
            'pressed' => 'false',
          ],
          array_values($categories)
        )
      );
      $rows = array_chunk($buttons, 4);
      ?>
      <div class="filter" role="group" aria-label="Projekte nach Kategorie filtern">
        <?php foreach ($rows as $row) : ?>
          <div class="filter__row">
            <?php foreach ($row as $button) : ?>
              <button
                type="button"
                class="filter__button"
                data-filter="<?= esc_attr($button['slug']) ?>"
                aria-pressed="<?= esc_attr($button['pressed']) ?>"
              ><?= esc_html($button['name']) ?></button>
            <?php endforeach; ?>
          </div>
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
