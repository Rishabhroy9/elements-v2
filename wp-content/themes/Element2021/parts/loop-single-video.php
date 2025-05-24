<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
    <div class="entry-content land-video" itemprop="text">
	   
		<section class="element-videofeed single">
		  
			<div class="videoPlayer selected">
			
				<button class="close-video" aria-label="close video" type="button">&times;</button>	
				<div class="frameContent"><strong><?php if ( get_field( 'client')): echo get_field('client'); endif;?></strong> - &ldquo;<?php the_title(); ?>&rdquo;</div>
				<div class="frameHolder"><iframe src="https://player.vimeo.com/video/<?= get_field('vimeo_code'); ?>" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
			
			</div>
			
		</section><!-- end .element-videofeed -->
		
	</div> <!-- end article section -->
			
	<div class="back-to-main">
		<div class="btm-link"><a href="/work" aria-label="back to creators index">See More Videos</a></div>
	</div>
					
</article> <!-- end article -->

