<?php

/**
 * CTA Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cta_type = get_field('cta_type');
$cta_title = get_field('cta_title');
$cta_link = get_field('cta_link');
?>

<div class="cta-block-wrap <?php echo $cta_type; ?>">
	
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		
 		<?php if( get_field('cta_type') == 'cta-1'):
			if( $cta_link ):
			$link_url = $cta_link['url'];
			$link_title = $cta_link['title'];
			$link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
			?>
				<div class="button-2"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
			<?php endif;
			elseif( get_field('cta_type') == 'cta-2'):
			echo $cta_title; 
			if( $cta_link ):
			$link_url = $cta_link['url'];
			$link_title = $cta_link['title'];
			$link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
			?>
				<div class="button-1"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
			<?php endif;
		endif; ?>
			
	</div>
	
</div>			

			
	
		



				
						
					
						
					
					