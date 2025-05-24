<?php
/**
 * The template part for displaying the featured image as a page background
 */
?>

	<?php if ( has_post_thumbnail($post->ID, 'full') ) :
		global $post; $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true, '' ); ?>

			<header class="page-header as-background" style="background-image: url(<?php echo $src[0]; ?> );">
				
			
			</header> <!-- end .page-header -->
				
	<?php endif; ?>