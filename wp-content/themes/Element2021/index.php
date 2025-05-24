<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

	
    <section id="element-video" class="element-videofeed reveal large" data-reveal data-close-on-click="true">
   
 		<div class="videoPlayer">
		
 			<button class="close-video" data-close="element-video" aria-label="close video" type="button">&times;</button>
			
 			<div class="frameContent"></div>
 			<div class="frameHolder"><iframe src="" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
		
 		</div>
		
 	</section>

	<div class="content">
		
		<header class="page-header uses-alternate" style="background-image: url(<?= get_field('index_header_img', 'option'); ?>);">
	
			<div class="header-overlay"></div>
	
			<div class="alternate-title">
				<h1 class="page-title"><?php if ( get_field( 'index_header_text', 'option')): echo get_field('index_header_text', 'option'); endif; ?></h1>
			</div><!-- end .alternate-title -->
	
		</header>
	
		<div class="inner-content grid-x">
	
		    <main class="main small-12 cell news-grid" role="main">

				 <div class="haps-auto">
					 
	 				<div id="news-masonry" class="grid">
						
	 				  <div class="grid-sizer"></div>
		    
				    	<?php
						$custom_query_args = array(
							'post_type' => array('post', 'videos'),
							'posts_per_page' => -1,
							'paged' => $paged,
							'post_status' => 'publish',
							'order' => 'DESC',
							'orderby' => 'date',
					        'meta_query'=> array(
					            array(
					              'key' => 'include_on_news',
								  'value' => 1,
					            )
					        ),
						);
						$custom_query = new WP_Query( $custom_query_args );
						if ( $custom_query->have_posts() ) :
						while( $custom_query->have_posts() ) : $custom_query->the_post();
						$postURL = get_the_post_thumbnail_url($post->ID, 'large');
				        $title = get_the_title( $post->ID );
				        $excerpt = get_the_excerpt( $post->ID );
						$permalink = get_permalink( $post->ID );
						$whatis = get_post_type( $post->ID );
						$thumb = get_the_post_thumbnail_url($post->ID, 'full');
						$altthumb = get_field( 'large_profile_image', $post->ID );
						$offsite_link = get_field( 'offsite_link', $post->ID );
						$index_teaser_style = get_field( 'index_teaser_style', $post->ID );
						$vimeo_code = get_field('vimeo_code', $post->ID);
						$title = get_the_title( $post->ID );
						$client = get_field('client', $post->ID);
						$terms_as_text = get_the_term_list( $post->ID, 'tax_videos', '', ', ', '' ) ; 
						?>
		 
				
					  	<article class="grid-item <?php echo $index_teaser_style; ?> hide">
				  	
			 		  	<div id="post-<?php the_ID(); ?>" class="haps-item" role="article">
						
			 				<?php if ($offsite_link): ?>
			 					<a href="<?php echo $offsite_link; ?>" target="_blank" rel="bookmark">
									
							<?php elseif ($vimeo_code): ?>	
									<a data-framesource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<strong><?php echo $client; ?></strong> - &ldquo;<?php echo $title; ?>&rdquo;" href="#" class="frameLink" data-open="element-video">
									
			 				<?php else: ?>
			 					<a href="<?php echo $permalink; ?>" rel="bookmark">
			 				<?php endif; ?>
						
						
							<?php if( $index_teaser_style == 'text-below'): ?>
							
								<div class="haps-image-alt">
									<img src="<?php echo $thumb; ?>" />
									<div class="haps-overlay">
									
									</div>
								</div>
							
							
							<?php elseif( $index_teaser_style == 'full-on'): ?>
							
								<div class="haps-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
								<div class="haps-image-overlay"></div>
								<div class="haps-overlay">
									
								</div>
							
							<?php elseif( $index_teaser_style == 'text-over'): ?>
							
								<div class="haps-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
								<div class="haps-image-overlay"></div>
								<div class="haps-overlay">
									
								</div>
							
							<?php elseif( $index_teaser_style == 'just-text'): ?>
						
		 						<!-- NO IMAGE -->
	 						
		 					<?php endif; ?>
						
								<div class="haps-content">
						
									<h6><?php echo $title; ?></h6>
									<?php the_excerpt(); ?>
						
								</div>
						
								</a><!-- CLOSE ANCHOR FROM ABOVE -->
				
			 		  	</div><!-- END .haps-item -->
					
					  </article><!-- END .grid-item -->  
				  
				  	<?php endwhile; ?>	

			<?php else : ?>
										
				<?php get_template_part( 'parts/content', 'missing' ); ?>
					
			<?php endif; ?>
			
				</div><!-- END .grid -->
			
			</div><!-- END .haps-auto -->
			
			<div class="fixed-pager"><button id="loadMore">I Need More</button></div>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>