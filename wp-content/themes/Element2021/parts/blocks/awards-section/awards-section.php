<?php

/**
 * Image Award Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<section class="awards_section pd_80">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-12 col-lg-6">
                <div class="left_content">
                    <?php if ($heading = get_field('award_heading')): ?>
                        <h2 class="award_text font_40 font_900" id="mainText"><?php echo $heading; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <ul class="awards_points list-unstyled row gy-3">
                    <?php if (have_rows('award_content')): ?>
                        <?php while (have_rows('award_content')): the_row(); ?>
                            <?php if ($item = get_sub_field('award_item')): ?>
                                <div class="col-6 col-lg-4">
                                    <li class="awards_item"><?php echo esc_html($item); ?></li>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
