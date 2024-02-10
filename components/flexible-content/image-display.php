<?php
    if (!empty($image)):
    $size = 'full'; ?>

<figure class="full-width">
    <?php
    if ($image) {
        echo wp_get_attachment_image($image['ID'], $image['alt'], $size, $attr['class'] = 'full-width__image');
    }
    ?>
</figure>

<?php endif;?>








