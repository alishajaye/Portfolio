<?php
$data = $args['data'];
$project_ids = get_project_ids();
?>

<section data-module="projects">
  <div class="header">
    <h1 class="title"><?= esc_html($data["title"]) ?></h1>
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
