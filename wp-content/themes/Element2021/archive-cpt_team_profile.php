<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x">
		
		    <main class="main small-12 cell" role="main">
				
				<?php if ( get_field( 'creators_header_img', 'option')): ?>
					<header class="page-header uses-alternate" style="background-image: url(<?= get_field('creators_header_img', 'option'); ?> );">
				<?php else : ?>
					<header class="page-header uses-alternate">
				<?php endif; ?>
					<div class="header-overlay"></div>
					<h1 class="page-title"><?php the_archive_description( );?></h1>
				</header>

		    	<?php if (have_posts()) : ?>
					
					<section class="creators-gallery">
						
						<div class="creators-intro show-for-medium">
							
							<div class="creators-intro-inner">
							
							<?php if ( get_field( 'creators_header_text', 'option')):
								echo get_field('creators_header_text', 'option');
							endif; ?>
							
							</div>
							
						</div>
						
						<div class="creators-list">
							
					<?php while (have_posts()) : the_post();
						$thumb = get_the_post_thumbnail_url($post->ID, 'full');
						$altthumb = get_field( 'large_profile_image', $post->ID );
						?>

						<div id="creator-<?php the_ID(); ?>" class="creator">
											
						<?php if ($thumb): ?>
							
							<div id="creator-thumb-<?php the_ID(); ?>" class="creator-thumb show-for-medium" area-hidden="true" style="background-image: url(<?php echo $thumb; ?> );"></div>
			
						<?php else: ?>
		
							<div id="creator-thumb-<?php the_ID(); ?>" class="creator-thumb show-for-medium" area-hidden="true" style="background-image: url(<?php echo $altthumb; ?> );"></div>
			
						<?php endif;?>
						
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								
								<?php the_title('<h2>', '</h2>'); 
								if ( get_field( 'title')): ?>
									<p><?= get_field('title'); ?></p>
								<?php endif;?>
								
							</a>
								
						</div> <!-- end .creator -->
					
					<?php endwhile;	?>
					
						</div><!-- end .creators-list -->
				
					</section> <!-- end .creators-gallery -->
				
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>