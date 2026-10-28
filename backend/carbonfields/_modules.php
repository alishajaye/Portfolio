<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make("text", "title", "Titel")->set_required(),
                Field::make("textarea", "subline", "Subline"),
                Field::make("image", "image", "Bild")->set_required(),
            ])
            // ->hero_default
            ->add_fields('hero_default', 'Hero Standard', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'subline', 'Subline'),
            ])
            // -> text
            ->add_fields('text', 'Text', [
                Field::make("text", "title", "Titel"),
                Field::make("rich_text", "text", "Text")->set_required(),
            ])
            // -> overview_projects
            ->add_fields('overview_projects', 'Übersicht Projekte', [
                Field::make("text", "title", "Titel")->set_required(),
                Field::make("association", "selection", "Auswahl Projekte")
                    ->set_types([
                        [
                            "type" => "post",
                            "post_type" => "project",
                        ]
                    ])
            ])
            // -> images
            ->add_fields('images', 'Bilder', [
                Field::make("media_gallery", "images", "Bilder")->set_required(),
            ])
            // -> projects
            ->add_fields('projects', 'Meine Projekte', [
                Field::make("text", "title", "Titel")->set_required(),
            ])

            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
            case "hero_front":
                $module["image"] = get_media_by_id($module["image"]);
                break;
            case "overview_projects" :
                $module["selection"] = array_map(function($item) {
                    return (int) $item["id"];
                }, $module["selection"]);
                break;
            case "images":
                $module["images"] = array_map("intval", $module["images"]);
                // todo: add data modifications for modules here as a new case
        }
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}

