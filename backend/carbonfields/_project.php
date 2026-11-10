<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        // Neu: Checkbox, ob der Zurück-Button angezeigt werden soll (standardmäßig an)
        Field::make('checkbox', 'show_back_button', 'Zurück-Button anzeigen')
             ->set_default_value(true),

        // Felder für den Hero-Bereich auf Projektseiten
        Field::make("text", "title", "Titel")->set_required(),
        Field::make("textarea", "subline", "Subline"),
        
        // Felder für den Zurück-Button oben rechts
        Field::make('text', 'back_label', 'Zurück-Button Text (optional)')
             ->set_default_value('← Alle Projekte'),
        Field::make('text', 'back_url', 'Zurück-Button Link (optional)')
             ->set_default_value('/projekte'),

        // Deine bestehenden Felder
        Field::make("image", "image", "Bild")->set_required(),
        Field::make("textarea", "description", "Beschreibung")->set_required()->set_help_text("Wird für den Teaser benötigt"),
        Field::make("textarea", "lead", "Lead")->set_required(),
        Field::make("rich_text", "text", "Text")->set_required(),
        Field::make("media_gallery", "images", "Bilder")->set_type(["image"]),
    ]);
    