<?php
$data = $args['data'];
$projects_page = get_page_by_path('projekte');
?>

<section data-module="overview_projects">
  <div class="header">
    <h2 class="title"><?= esc_html($data["title"]) ?></h2>
    <?php if ($projects_page) : ?>
      <a class="button" href="<?= esc_url(get_permalink($projects_page)) ?>">Alle Projekte</a>
    <?php endif; ?>
  </div>

  <div class="projects">
    <?php foreach ($data["selection"] as $project_id) : ?>
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
</section>
