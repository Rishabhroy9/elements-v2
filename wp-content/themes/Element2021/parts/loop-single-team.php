<?php
/**
 * Template part for displaying a single team member
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
	
	<?php
	$thumb = get_the_post_thumbnail_url($post->ID, 'large');
	$altthumb = get_field( 'large_profile_image', $post->ID );
	$biothumb = get_field( 'bio_image', $post->ID );
	?>
	
	<?php if( $altthumb ):  ?>
		
		<header class="page-header uses-alternate" style="background-image: url(<?php echo $altthumb; ?>);">
			
	<?php else: ?>
		
		<header class="page-header uses-alternate" style="background-image: url(<?php echo $thumb; ?>);">
			
	<?php endif;?>
	
			<div class="header-overlay"></div>
		
			<div class="header-content team">
			
				<?php if ( get_field( 'name')): ?>
					<h1 class="page-title"><?= get_field('name'); ?></h1>
				<?php endif;
				if ( get_field( 'title')): ?>
					<p class="up-from"><?= get_field('title'); ?></p>
				<?php endif;?>
				<div class="bio-link up-from"><a href="#bio-anchor"></a></div>
			
			</div>
		
		</header>
		
	    <section id="element-video" class="element-videofeed reveal large" data-reveal data-close-on-click="true">
   
	 		<div class="videoPlayer">
		
	 			<button class="close-video" data-close="element-video" aria-label="close video" type="button">&times;</button>
			
	 			<div class="frameContent"></div>
	 			<div class="frameHolder"><iframe src="" frameborder="0" allowfullscreen allow=autoplay></iframe></div>
		
	 		</div>
		
	 	</section>
									
				<?php 
				$associated = get_field('associated_videos');
				$secondQuery = array( 
					'post_type' => 'videos', 
					'posts_per_page' => '6', 
					'post__in'    => $associated,
					'orderby' =>  'post__in',
		
					); 
				$second = new WP_Query( $secondQuery ); 
				if ($second->have_posts()) : ?>
					
					<div class="videoSelectorWrapper">
					<div class="videoSelector creator-video-grid pad grid-x grid-margin-x">
		
						<?php while ($second->have_posts()) : $second->the_post();
						$vimeo_code = get_field('vimeo_code');
						$title = get_the_title();
						$client = get_field('client');
						$terms_as_text = get_the_term_list( $second->ID, 'tax_videos', '', ', ', '' ) ; 
						global $post; $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', true, '' ); ?>
		
						<div class="item creator-video-cell single-issue small-12 medium-6 cell">
						
						<div class="creator-video-bg" style="background-image: url(<?php echo $src[0]; ?> );"></div>
								
						<a data-open="element-video" data-videosource="vimeo" data-framecode="<?php echo $vimeo_code; ?>" data-framecontent="<strong><?php echo $client; ?></strong> - &ldquo;<?php echo $title; ?>&rdquo;" href="#" class="frameLink">
						
							<div class="creator-cell-title"> 
								<h4><?php if( $client ): echo $client; else: echo $title; endif;?></h4>
								<div class="creator-cell-cats"><?php echo strip_tags($terms_as_text); ?></div>
							</div>
						
							</a>
						
						</div>
					
						<?php endwhile; ?>
		

					</div>	
					</div>
 
		<?php endif;
		wp_reset_postdata(); ?>
			
		<div class="gray-wrap">	
					
	    <section id="bio-anchor" class="team-content grid-x" itemprop="text">
			<?php if( $biothumb ):  ?>		
			<div class="small-12 medium-4 cell team-bio-image" style="background-image: url(<?php echo $biothumb; ?>);"></div>
			<?php endif;?>
			<div class="small-12 medium-7 cell team-bio-content">
				<?php if ( get_field( 'name')): ?>
					<h2><?= get_field('name'); ?></h2>
				<?php endif;	
				if ( get_field( 'title')): ?>
					<h6><?= get_field('title'); ?></h6>
				<?php endif;
				if ( get_field( 'bio')):
					echo get_field('bio');
				endif;?>
			
				<div class="team-contact grid-x">
					
					<div class="small-12 cell">
						<?php 
						$team_email = get_field('email');
						if( $team_email ): ?>
						    <a class="last-word" href="mailto:<?= get_field('email'); ?>">Work With <?= get_field('name'); ?></a>
							
						<?php else: ?>
							
							<a class="last-word" href="mailto:<?= get_field('email_fallback', 'option'); ?>?subject=Work with <?= get_field('name'); ?>">Work With <?= get_field('name'); ?></a>
						
						<?php endif;
						$instagram_link = get_field('instagram');
						if( $instagram_link ): ?>
						    <a class="team-social" href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><i aria-hidden="true" class="fab fa-instagram"></i></a>
						<?php endif; ?>
						<?php 
						$site_link = get_field('personal_website');
						if( $site_link ): ?>
						    <a class="team-social" href="<?php echo esc_url( $site_link ); ?>" target="_blank"><i aria-hidden="true" class="far fa-link"></i></a>
						<?php endif; ?>
					</div>
				
				</div>
		
			</div><!-- end team-bio-content -->
		
			<div class="small-12 medium-1 cell"></div>
		
		</section> <!-- end team-content -->
	
	</div><!-- end gray-wrap -->
	
	<div class="back-to-main">

		<?php   // Get terms for post
		$terms = get_the_terms( $post->ID , 'process' );
		if ( $terms != null ){
		foreach( $terms as $term ) {
		$term_link = get_term_link( $term, 'process' );
		echo '<div class="btm-link"><a href="' . $term_link . '"> See More ' . $term->name . '</a></div>';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term); } } ?>

	</div>
															
</article> <!-- end article -->