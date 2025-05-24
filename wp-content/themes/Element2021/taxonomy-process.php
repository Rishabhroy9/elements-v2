<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	<?php
	$terms = wp_get_object_terms($post->ID, 'process');
	if (!empty($terms)) {
		foreach ($terms as $term) {
			$cat_image = get_field('category_image', $term);
			$index_rows = get_field('index_rows', $term);
		}
	} ?>
			
	<div class="content">
	
		<div class="inner-content">
		
		    <main class="main tax-archive" role="main" style="background-image: url(<?php echo $cat_image; ?>);">
			<div class="dark-overlay"></div>

		    	<h1 class="screen-reader-text"><?php the_archive_title();?></h1>
		    	
		    	<?php if (have_posts()) : ?>

					<section class="grid-x">
					
						<?php while (have_posts()) : the_post(); ?>

						<div class="cell small-12 medium-6 large-4 <?php echo $index_rows; ?>">
			 
							<?php if ( get_field( 'name')): ?>
								<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?= get_field('name'); ?></a></h2>
							<?php endif;
							if ( get_field( 'title')): ?>
								<h3><?= get_field('title'); ?></h3>
							<?php endif;?>

						</div>
				    
						<?php endwhile; ?>

					</section>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>