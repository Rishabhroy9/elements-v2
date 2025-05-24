<?php

/**
 * Animated Media Text Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'animated-mediatext' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'animated-mediatext';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$animated_position = get_field('animated_position');
$animated_image = get_field('animated_image');
$animated_text = get_field('animated_text');
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if (is_admin()) : ?>effect<?php endif; ?>">

	<div class="cause"></div>
	<div class="block-wrapper">

		<div class="block-grid <?php echo $animated_position; ?>">

			<?php if ($animated_position == 'left') : ?>

				<div class="animated-lft animated-image" style="background-image: url(<?php echo $animated_image; ?>);"><img class="mobile-image" src="<?= $animated_image ?>"></div>
				<div class="animated-rgt"><?php echo $animated_text; ?></div>

			<?php elseif ($animated_position == 'right') : ?>

				<div class="animated-lft"><?php echo $animated_text; ?></div>
				<div class="animated-rgt animated-image" style="background-image: url(<?php echo $animated_image; ?>);"><img class="mobile-image" src="<?= $animated_image ?>"></div>

			<?php endif; ?>



		</div>
		<!--END .block-grid -->

	</div>
	<!--END .block-wrapper -->

</div>

<?php if (is_admin()) : ?>



<?php endif; ?>