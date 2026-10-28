<?php
$project = get_project_by_id(get_the_ID());
?>

<main data-page="project">

  <section class="project-hero">
    <?php if (!empty($project["project_categories"])) : ?>
      <p class="category">
        <?php foreach ($project["project_categories"] as $category) : ?>
          <span class="category-item"><?= esc_html($category) ?></span>
        <?php endforeach; ?>
      </p>
    <?php endif; ?>

    <p class="preline">Projekt</p>
    <h1 class="title"><?= esc_html($project["title"]) ?></h1>
  </section>

  <section class="project-content">
    <?php if (!empty($project["lead"])) : ?>
      <p class="lead"><?= esc_html($project["lead"]) ?></p>
    <?php endif; ?>

    <?php if (!empty($project["text"])) : ?>
      <div class="text"><?= wp_kses_post(wpautop($project["text"])) ?></div>
    <?php endif; ?>
  </section>

  <?php if (!empty($project["images"])) : ?>
    <section data-module="images">
      <div class="images">
        <?php foreach ($project["images"] as $image_id) : ?>
          <div class="images__item">
            <?= wp_get_attachment_image(
              $image_id,
              'large',
              false,
              ['sizes' => '(max-width: 600px) 100vw, 30vw']
            ) ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

</main>
