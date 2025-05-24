<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
	<!-- loop-work.php -->
 	<?php if( get_field('hide_thumb') ) { } else { get_template_part( 'parts/content', 'hero' ); } ?>
	
    <section id="element-video" class="element-videofeed reveal large" data-reveal data-close-on-click="true">
   
 		<div class="videoPlayer">
		
 			<button class="close-video" data-close="element-video" aria-label="close video" type="button"></button>
			
 			<div class="frameContent"></div>
 			<div class="frameHolder"><iframe src="" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
		
 		</div>
		
 	</section>
		
	<section class="entry-content" itemprop="text">
		
		<button class="mobile-filters hide-for-medium">Filter Videos</button>
		
		<div id="work-filters"><?php echo facetwp_display( 'facet', 'video_type' ); ?></div>
		
		<?php get_template_part( 'parts/loop', 'work-topfeed' ); ?>

	</section> <!-- end article section -->
					
</article> <!-- end article -->