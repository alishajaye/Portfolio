
<?php
$menu = get_menu_by_slug(slug: "legals");
$logo = get_globals_logo();
$socials = get_globals_socials();
?>

<footer class="site-footer" data-layout="footer">

    <!-- Logo links -->
    <a class="footer-logo" href="<?= esc_url(home_url('/')) ?>">
        <img
            src="<?= esc_url($logo["src"]) ?>"
            alt="<?= esc_attr($logo["alt"]) ?>"
        >
    </a>

    <!-- Informationen rechts -->
    <div class="footer-content">

        <p class="footer-copyright">
            © Alisha Künzi
        </p>

        <!-- Social Media und E-Mail -->
        <div class="footer-socials">

            <?php foreach ($socials as $item) : ?>
                <a
                    href="<?= esc_url($item["link"]) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="<?= esc_attr($item["title"]) ?>"
                >
                    <img
                        src="<?= esc_url($item["icon"]["src"]) ?>"
                        alt=""
                    >
                </a>
            <?php endforeach; ?>

            <!-- E-Mail -->
            <a
                href="mailto:alishajk@gmx.ch"
                aria-label="E-Mail an Alisha Künzi senden"
                title="E-Mail schreiben"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="28"
                    height="28"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                    <path d="m3 7 9 6 9-6"/>
                </svg>
            </a>

        </div>

        <!-- Datenschutz und Impressum -->
        <nav class="footer-navigation" aria-label="Rechtliche Informationen">
            <ul class="footer-nav">
                <?php foreach ($menu as $item) : ?>
                    <li>
                        <a
                            href="<?= esc_url($item["url"]) ?>"
                            target="<?= esc_attr($item["target"] ?? '_self') ?>"
                        >
                            <?= esc_html($item["title"]) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

    </div>

</footer>
