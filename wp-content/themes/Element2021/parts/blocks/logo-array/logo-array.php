<?php

/**
 * Logo Array Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logo-array' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logo-array';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$type_array = get_field('type_array');
$array_wysiwyg = get_field('array_wysiwyg');
?>

<div class="padded-wrap <?php echo $type_array; ?>">
	
	<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
	
		<?php if( get_field('type_array') == 'logo-1'): ?>
		
		<?php echo $array_wysiwyg; ?>
	
			<div class="splide logo-ticker">

				<div class="splide__track">

					<ul class="splide__list">

						<?php 
						$images = get_field('logo_array');
						if( $images ): 
						foreach( $images as $image ): ?>

						<li class="splide__slide logo-image"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></li>

						<?php endforeach; endif; ?>

					</ul><!--END .splide__list -->
		
				</div><!--END .splide__track -->
			
			</div><!--END .splide -->
	
		<?php elseif( get_field('type_array') == 'logo-2'): ?>
		
		<div class="logo-array-inner">
		
			<?php echo $array_wysiwyg; ?>
			
 			<div class="splide dark-ticker">

 				<div class="splide__track">

 					<ul class="splide__list">

 						<?php 
 						$images = get_field('logo_array');
 						if( $images ): 
 						foreach( $images as $image ): ?>

 						<li class="splide__slide logo-image"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></li>

 						<?php endforeach; endif; ?>

 					</ul><!--END .splide__list -->
		
 				</div><!--END .splide__track -->
			
 			</div><!--END .splide -->
			
		</div>
		
		<?php elseif( get_field('type_array') == 'offset-1'): ?>
		
		<div class="offset-gallery-inner">
		
			<div class="splide offset-gallery">

				<div class="splide__track">

					<ul class="splide__list">

						<?php 
						$images = get_field('logo_array');
						if( $images ): 
						foreach( $images as $image ): ?>

						<li class="splide__slide offset-image"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></li>

						<?php endforeach; endif; ?>

					</ul><!--END .splide__list -->
		
				</div><!--END .splide__track -->
			
			</div><!--END .splide -->
			
		</div>
	
		<?php endif; ?>
	
	</section>
	
</div>