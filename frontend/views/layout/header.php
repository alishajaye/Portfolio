<?php
$menu = get_menu_by_slug(slug: "main");
$logo = get_globals_logo();
?>

<header class="site-header" data-layout="header">

    <a class="site-logo" href="<?= esc_url(home_url('/')) ?>">
        <img
            class="logo"
            src="<?= esc_url($logo["src"]) ?>"
            alt="<?= esc_attr($logo["alt"]) ?>"
        >
    </a>

    <nav class="site-navigation" aria-label="Hauptnavigation">
        <ul class="nav">

            <?php foreach ($menu as $index => $item) : ?>
                <li class="nav-item">
                    <a
                        href="<?= esc_url($item["url"]) ?>"
                        target="<?= esc_attr($item["target"] ?? '_self') ?>"
                    >
                        <span class="nav-number">
                            <?= sprintf('%02d', $index + 1) ?>
                        </span>

                        <span class="nav-title">
                            <?= esc_html($item["title"]) ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </nav>

</header>
