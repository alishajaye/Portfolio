<?php

function get_project_by_id(int $id): array {
    // -> collect data
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, "image");
    $image = get_media_by_id($image_id);
    $lead = carbon_get_post_meta($id, "lead");
    $description = carbon_get_post_meta($id, "description");
    $text = carbon_get_post_meta($id, "text");
    $images = carbon_get_post_meta($id, "images");
    $link = get_permalink($id);

    // -> load project_category
    $terms = get_the_terms($id, "project_category");
    $terms = (!empty($terms) && !is_wp_error($terms)) ? $terms : [];
    $project_categories = array_values(array_map(fn($item) => $item->name, $terms));
    $project_category_slugs = array_values(array_map(fn($item) => $item->slug, $terms));

    // -> return data
    return [
        "title" => $title,
        "image" => $image,
        "lead" => $lead,
        "description" => $description,
        "text" => $text,
        "images" => array_map("intval", $images ?: []),
        "project_categories" => $project_categories,
        "link" => $link,
        "project_category_slugs" => $project_category_slugs,
    ];
}

function get_project_ids(): array {
    return get_posts([
        'post_type'      => 'project',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ]);
}