<?php

/**
 * Image Partner Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<section class="partner-section pd_80" id="partner">
    <div class="container">
        <div class="text-center">
            <?php if ($heading = get_field('partner_heading')): ?>
                <h2 class="section_heading font_40 font_700"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
        </div>

        <div class="clients-wrapper pt-5">
            <div class="clients-container scroll-left">
                <?php if (have_rows('partner_section')): ?>
                    <?php while (have_rows('partner_section')): the_row(); ?>
                        <?php 
                            $image = get_sub_field('partner_images');
                            if ($image): ?>
                            <div class="client-logo">
                                <img src="<?php echo esc_url($image); ?>" alt="partner">
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
