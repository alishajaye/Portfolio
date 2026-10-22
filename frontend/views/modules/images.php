<?php
$data = $args['data'];
?>

<section data-module="images">
    <div class="images">
        <?php if (!empty($data['images'])) : ?>
            <?php foreach ($data['images'] as $image_id) : ?>
                <div class="images__item">
                    <?php
                    echo wp_get_attachment_image(
                        $image_id,
                        'large'
                    );
                    ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
