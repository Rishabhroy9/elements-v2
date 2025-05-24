<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
		
	<?php
		// $page_bg = get_field('page_bg');
		// if ($page_bg == 'default') :
		// 	get_template_part( 'parts/content', 'hero' );
		// elseif ($page_bg == 'as-background') :
		// 	get_template_part( 'parts/content', 'background' );
		// endif;
		//  ?>
	
   <section id="element-video" class="element-videofeed reveal large" data-reveal data-close-on-click="true">
   
		<div class="videoPlayer">
		
			<button class="close-video" data-close="element-video" aria-label="close video" type="button"></button>
			
			<div class="frameContent"></div>
			<div class="frameHolder"><iframe src="" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
		
		</div>
		
	</section>
		
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
					
</article> <!-- end article -->