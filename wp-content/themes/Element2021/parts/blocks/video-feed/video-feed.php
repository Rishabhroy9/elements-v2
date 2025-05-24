<?php

/**
 * Video Feed Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-feed-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'video-feed';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$feed_picks = get_field('feed_picks');
?>

	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		<?php
		if( $feed_picks ): ?>
		   <section class="element-videofeed"> 
		   
			<!-- FOR CUSTOM BLOCKS VIDEO PLAYER MOVED TO PAGE TEMPLATE SO FEATURE REEL AND VIDEO FEED WILL WORK TOGETHER -->
			   
			<div class="videoSelectorWrapper">
			<div class="videoSelector creator-video-grid pad grid-x grid-margin-x">
		    <?php foreach( $feed_picks as $feed_pick ): 
		   	 	$terms_as_text = get_the_term_list( $feed_pick->ID, 'tax_videos', '', ', ', '' ) ;
				$title = get_the_title( $feed_pick->ID );
				$vimeo_code = get_field( 'vimeo_code', $feed_pick->ID );
				$client = get_field( 'client', $feed_pick->ID );
				$testy = '<strong>'.$client.'</strong>';
				$feedID = $feed_pick->ID;
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($feed_pick->ID), 'full', true, '' );
		        ?>
				
				<div class="item trigger creator-video-cell small-12 medium-6 cell">
					<div class="cause"></div>
					<div class="creator-video-bg" style="background-image: url(<?php echo $thumb[0]; ?> );"></div>
					<a data-anchor="#vid-<?php echo $feedID; ?>" data-open="element-video" data-videosource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<?php echo $client; ?> - &ldquo;<?php echo $title; ?>&rdquo;" class="frameLink">
					<div class="creator-cell-title"> 
         
						<h4><?php if( $client ): echo $client; else: echo $title; endif;?></h4>
						<div class="creator-cell-cats"><?php echo strip_tags($terms_as_text); ?></div>

					</div>
					</a>
				</div>
				
				
				
		    <?php endforeach; ?>
		   </div>
		   </div>
		   </section>
		<?php endif; ?>

	</div>			