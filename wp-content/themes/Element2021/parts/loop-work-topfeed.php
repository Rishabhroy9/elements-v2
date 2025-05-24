<?php
/**
 * Template part for displaying top feed of work index
 */
?>


		<?php
		$main_page = $post->ID;
		$content_post = get_post($main_page);
		$pagecontent = $content_post->post_content;
		$pagecontent = apply_filters('the_content', $pagecontent);
		$pagecontent = str_replace(']]>', ']]&gt;', $pagecontent);
		$posts_per_page = get_option( 'posts_per_page' );
		$videoQuery = array( 
			'post_type' => 'videos',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'facetwp' => true,
			'meta_query' => array(
				'relation' => 'OR',
			        array(
			            'key'   => 'hide_from_work',
			            'value' => '0',
			        ),
			        array(
			            'key'   => 'hide_from_work',
			            'compare' => 'NOT EXISTS',
			        )
			    )
			);
		$video = new WP_Query( $videoQuery );
		if ($video->have_posts()) :
		$paged = FWP()->facet->pager_args['page'];
		$total_posts = $video->found_posts;
		$total_pages = $total_posts / $posts_per_page;	
		$counter = 1 + 18 * ($paged - 1);
		?>
		
		<div id="menu-message">
			<span class="show" data-id="">A selection of our most recent work</span> <?php $terms = get_terms( 'video_type' );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		    foreach ( $terms as $term ) {
		        echo '<span data-id="' . $term->slug . '">' . $term->description . '</span>';
		  } } ?>
		</div>		

			<div class="videoSelectorWrapper">
			<div class="videoSelector creator-video-grid pad grid-x grid-margin-x">
			
				<?php while ($video->have_posts()) : $video->the_post(); 
					$vimeo_code = get_field('vimeo_code');
					$title = get_the_title();
					$client = get_field('client');
					$terms_as_text = get_the_term_list( $post->ID, 'tax_videos', '', ', ', '' ) ;
					$postURL = get_the_post_thumbnail_url($post->ID, 'large');
					if (10 == $counter) { ?>
						
						<div id='work-content' class='small-12 cell'>
							<?php echo $pagecontent; ?>
						</div>
						
					<?php } ?>

					<div id="vid-<?php the_ID(); ?>" class="item creator-video-cell small-12 medium-6 large-4 cell count-<?php echo $counter; ?>">
						
						<div class="creator-video-bg" style="background-image: url(<?php echo $postURL; ?> );"></div>
						<a data-anchor="#vid-<?php the_ID(); ?>" data-framesource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<strong><?php echo $client; ?></strong> - &ldquo;<?php echo $title; ?>&rdquo;" class="frameLink" data-open="element-video">
				
						<div class="creator-cell-title">
							
							<h4><?php if( $client ): echo $client; else: echo $title; endif;?></h4>
							<div class="creator-cell-cats"><?php echo strip_tags($terms_as_text); ?></div>
						</div>
					
						</a>
					
					</div>

				<?php 
				$counter++;
				endwhile; ?>
		
			</div>	
			</div>
			
			<?php echo facetwp_display( 'facet', 'news_pager' ); ?>	
		
		<?php endif;
		wp_reset_query(); ?>
