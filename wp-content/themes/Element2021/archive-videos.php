<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header('stuck'); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x">
		
		    <main class="main small-12 medium-12 large-12 cell" role="main">
				
				<div class="entry-content land-video">
					
					<?php if (have_posts()) : ?>
						<?php echo facetwp_display( 'facet', 'video_tax' );?>
					
		       <section id="element-video" class="element-videofeed reveal large" data-reveal data-close-on-click="true">
   
		    		<div class="videoPlayer">
		
		    			<button class="close-video" data-close="element-video" aria-label="close video" type="button"></button>
			
		    			<div class="frameContent"></div>
		    			<div class="frameHolder"><iframe src="" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
		
		    		</div>
		
		    	</section>

	 			<div class="videoSelectorWrapper">
	 			<div class="videoSelector creator-video-grid pad grid-x grid-margin-x">
					
					<?php while (have_posts()) : the_post();
						$vimeo_code = get_field('vimeo_code');
						$title = get_the_title();
						$client = get_field('client');
						$terms_as_text = get_the_term_list( $post->ID, 'tax_videos', '', ', ', '' ) ;
						$postURL = get_the_post_thumbnail_url($post->ID, 'large');?>
					
					<div id="vid-<?php the_ID(); ?>" class="item creator-video-cell small-12 medium-6 large-4 cell count-<?php echo $counter; ?>">
						<div class="creator-video-bg" style="background-image: url(<?php echo $postURL; ?> );"></div>
						<a data-anchor="#vid-<?php the_ID(); ?>" data-framesource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<strong><?php echo $client; ?></strong> - &ldquo;<?php echo $title; ?>&rdquo;" href="#" class="frameLink" data-open="element-video">
				
						<div class="creator-cell-title">
							 
							<h4><?php echo $client; ?></h4>
							<div class="creator-cell-cats"><?php echo strip_tags($terms_as_text); ?></div>
						</div>
					
						</a>
					
					</div>
					
					<?php endwhile; ?>	

				</div>
				</div>
				
				
				
				<?php echo facetwp_display( 'facet', 'news_pager' ); ?>	
				
				</div>
				<?php else : ?>
					
				<?php endif; ?>
			    
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>