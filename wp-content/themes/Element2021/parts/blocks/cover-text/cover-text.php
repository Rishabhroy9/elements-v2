<?php

/**
 * Cover Text Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cover-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cover-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cover_text_bg = get_field('cover_text_bg');
$cover_text_left = get_field('cover_text_left');
$cover_text_right = get_field('cover_text_right');
?>


	
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url(<?php echo $cover_text_bg; ?>);">
		<div class="cover-text-overlay"></div>
		<div class="cover-text-inner grid-x">
			
			<div class="small-12 medium-6 cell cover-text-left">
				<?php echo $cover_text_left; ?>
			</div>
		
			<div class="small-12 medium-6 cell cover-text-right">
			
				<?php echo $cover_text_right; ?>
			</div>
		
		</div>
			
	</div>			