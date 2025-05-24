<?php

/**
 * Video Modal Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'feature-reel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'feature-reel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$reel_title = get_field('reel_title');
$reel_video = get_field('reel_video');
if( $reel_video ):
$title = get_the_title( $reel_video->ID );
$client = get_field( 'client', $reel_video->ID );
$vimeo_code = get_field( 'vimeo_code', $reel_video->ID );
?>
	
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		
	   <!-- FOR CUSTOM BLOCKS VIDEO PLAYER MOVED TO PAGE TEMPLATE SO FEATURE REEL AND VIDEO FEED WILL WORK TOGETHER -->
		
			<div class="reel-title">
			<a data-anchor="#vid-<?php echo esc_attr($id); ?>" data-open="element-video" data-videosource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<?php echo $client; ?> - &ldquo;<?php echo $title; ?>&rdquo;" href="#video-anchor" class="frameLink"><?php echo $reel_title; ?></a>
			</div>
		
	</div>
	
<?php endif; ?>




				
						
					
						
					
					