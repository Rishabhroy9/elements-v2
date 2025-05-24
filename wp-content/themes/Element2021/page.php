<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */


 ?>
 	
	 <?php
get_header(); ?>
	
	<div class="content">
	
			<div class="inner-content grid-x">
	
			    <main class="main small-12 medium-12 large-12 cell" role="main">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php get_template_part( 'parts/loop', 'page' ); ?>
					
					<?php endwhile; endif; ?>							

				</main>  
		    
			</div>  
	
		</div>  

<?php get_footer(); ?>