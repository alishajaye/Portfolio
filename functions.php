<?php
require_once __DIR__ . '/backend/init/index.php';
require_once __DIR__ . '/backend/helpers/index.php';
require_once __DIR__ . '/backend/nav/index.php';
require_once __DIR__ . '/backend/cpt/index.php';
require_once __DIR__ . '/backend/tax/index.php';
require_once __DIR__ . '/backend/carbonfields/index.php';
require_once __DIR__ . '/backend/getter/index.php';
add_filter('wp_video_shortcode_library', fn() => 'html5');
add_shortcode('video_row', function ($atts, $content = '') {
    $content = do_shortcode($content);
    // Reste von wpautop (p- und br-Tags) entfernen und Zeilenumbrüche glätten
    $content = preg_replace('#</?(?:p|br)(?=[\s/>])[^>]*>#i', '', $content);
    $content = trim(preg_replace('/\s+/', ' ', $content));

    return '<div class="video-row">' . $content . '</div>';
});
