<?php

/**
 * Text Slider Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'textslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'the-textslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text_slider = get_field('text_slider');
?>

<div class="textslider-wrap">
	
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		
 		<?php if( have_rows('text_slider') ): ?>
			
			<div class="splide text-slider">

				<div class="splide__track">

					<div class="splide__list">
						
						<?php while( have_rows('text_slider') ): the_row();
							$slider_content = get_sub_field('slider_content');
						?>

						<div class="splide__slide textslider-entry">
						
							<?php echo $slider_content; ?>
					
						</div>
						
						<?php endwhile; ?>

					</div><!--END .splide__list -->
		
				</div><!--END .splide__track -->
			
			</div><!--END .splide -->
					
 		<?php endif; ?>
			
	</div>
	
</div>	

			
	
		



				
						
					
						
					
					