<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>
			
	<div class="content">

		<div class="inner-content grid-x">
	
			<main class="main small-12 medium-12 large-12 cell" role="main">

				<article class="content-not-found">
				
					<?php if ( get_field( 'header_img_404', 'option')): ?>
						<header class="page-header uses-alternate" style="background-image: url(<?= get_field('header_img_404', 'option'); ?> );">
					<?php else : ?>
						<header class="page-header uses-alternate">
					<?php endif; ?>
						<div class="header-overlay"></div>
						
						
						
							
	
							
		
								<div class="header-content team">
			
									<?php if ( get_field( 'header_title_404', 'option')): ?>
										<h1 class="page-title"><?= get_field('header_title_404', 'option'); ?></h1>
									<?php endif; ?>
									<?php if ( get_field( 'header_subtitle_404', 'option')): ?>
										<p class="up-from"><?= get_field('header_subtitle_404', 'option'); ?></p>
									<?php endif; ?>

								</div>
		
							</header>
						
						
						
						
					</header>
			
				</article> <!-- end article -->
	
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>