<?php

/**
 * Image Slider Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

 <section class="our_recent pd_80">
    <div class="text-center">
        <h2 class="section_heading font_40 font_700"><?php the_field('heading'); ?></h2>
    </div>

    <div class="slider_wrapper">
        <div class="image-slider">
            <?php if (have_rows('image_slider_')): ?>
                <?php while (have_rows('image_slider_')): the_row();
                    $image_url = get_sub_field('image_item');
                    if ($image_url): ?>
                        <div class="slider_item">
                            <img src="<?php echo esc_url($image_url); ?>" class="slider_img" alt="slider image" />
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
