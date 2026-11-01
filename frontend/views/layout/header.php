<?php
global $wp;

$menu = get_menu_by_slug(slug: "main");
$logo = get_globals_logo();

// -> aktuelle Seite bestimmen
$current_url   = trailingslashit(home_url($wp->request));
$front_page_id = (int) get_option('page_on_front');
$front_urls    = array_filter([
  trailingslashit(home_url('/')),
  $front_page_id ? trailingslashit(get_permalink($front_page_id)) : null,
]);
?>

<header class="site-header" data-layout="header">

  <a class="site-logo" href="<?= esc_url(home_url('/')) ?>">
    <img
      class="logo"
      src="<?= esc_url($logo["src"]) ?>"
      alt="<?= esc_attr($logo["alt"]) ?>"
    >
  </a>

  <button
    class="nav-toggle"
    type="button"
    aria-expanded="false"
    aria-controls="site-navigation"
    aria-label="Menü öffnen"
  >
    <span class="nav-toggle__bar"></span>
    <span class="nav-toggle__bar"></span>
    <span class="nav-toggle__bar"></span>
  </button>

  <nav id="site-navigation" class="site-navigation" aria-label="Hauptnavigation">
    <ul class="nav">

      <?php foreach ($menu as $index => $item) : ?>
        <?php
        $item_url   = trailingslashit($item["url"]);
        $is_current = $item_url === $current_url
          || (is_front_page() && in_array($item_url, $front_urls, true));
        ?>
        <li class="nav-item">
          <a
            href="<?= esc_url($item["url"]) ?>"
            target="<?= esc_attr($item["target"] ?? '_self') ?>"
            <?= $is_current ? 'aria-current="page"' : '' ?>
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
