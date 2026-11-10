<?php
$project = get_project_by_id(get_the_ID());

// Einstellungen für den Zurück-Button
$show_back_button = isset($project['show_back_button']) ? $project['show_back_button'] : true;
$back_url         = !empty($project['back_url']) ? $project['back_url'] : '/projekte';
$back_label       = !empty($project['back_label']) ? $project['back_label'] : '← Alle Projekte';
?>

<main data-page="project">

  <!-- Kopfbereich (Hero) -->
  <section class="project-hero">
    <?php if ($show_back_button) : ?>
      <a class="button-back" href="<?= esc_url($back_url) ?>"><?= esc_html($back_label) ?></a>
    <?php endif; ?>

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

  <!-- Inhaltsbereich (Lead, Text & Navigation unten rechts) -->
  <section class="project-content">
    <?php if (!empty($project["lead"])) : ?>
      <p class="lead"><?= esc_html($project["lead"]) ?></p>
    <?php endif; ?>

    <?php if (!empty($project["text"])) : ?>
      <div class="text"><?= render_rich_text($project["text"]) ?></div>
    <?php endif; ?>

  </section>

  <!-- Bildergalerie -->
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