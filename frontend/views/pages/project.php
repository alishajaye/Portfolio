<?php
$project = get_project_by_id(get_the_ID());
js_log($project);
?>

<main data-page="project">
    <p class="category">
        <?php foreach ($project["project_categories"] as $category) : ?>
        <span class="category-item"><?= $category?></span>
        <?php endforeach; ?>
    </p>
    <p class="preline">Projekt</p>
    <h1 class="title"><?= $project["title"] ?></h1>
    <img class="image" src="<?= $project["image"]["src"] ?>" alt="<?= $project["image"]["alt"] ?>">
    <p class="lead"><?= $project["lead"] ?></p>
    <div class="text">
        <?= wpautop($project["text"]); ?>
    </div>
</main>
