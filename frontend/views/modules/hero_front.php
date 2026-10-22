<?php
$data = $args['data'];
?>

<section data-module="hero_front">
    <div class="content">
        <h1 class="title"><?= esc_html($data["title"]) ?></h1>
        <?php if ($data["subline"]) : ?>
            <p class="subline"><?= esc_html($data["subline"]) ?></p>
        <?php endif; ?>
    </div>
    <img class="image" src="<?= esc_url($data["image"]["src"]) ?>" alt="<?= esc_attr($data["image"]["alt"]) ?>">
</section>
