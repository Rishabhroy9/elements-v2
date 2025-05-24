<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right grid-x" data-transition="overlap" data-transition-time="0.1ms" id="off-canvas" data-off-canvas>
	
	<div class="revealer">
		<div class="revealer_layer_2"></div>
		<div class="revealer_layer_3"></div>
	</div>
	
	<nav id="main-menu" class="small-12 medium-8 cell" role="navigation">
		<?php joints_off_canvas_nav(); ?>
	</nav>
	
	<aside id="overlay-sidebar" class="small-12 medium-4 cell">
		
		<h2><?php bloginfo('name'); ?></h2>
		<?php
		if ( get_field( 'email', 'option')): ?>
			<p><a href="mailto:<?= get_field('email', 'option'); ?>"><?= get_field('email', 'option'); ?></a></p>
		 <?php endif;
		if ( get_field( 'contact_title', 'option')): ?>
			<h3><?= get_field('contact_title', 'option'); ?></h3>
		<?php endif;
		$link = get_field('contact_link', 'option');
		if( $link ): 
		    $link_url = $link['url'];
		    $link_title = $link['title'];
		    $link_target = $link['target'] ? $link['target'] : '_self';
		    ?>
		    <h3 class="underscore"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></h3>
		<?php endif; 
		if( have_rows('social_media_links', 'option') ):
		while( have_rows('social_media_links', 'option') ): the_row(); 
			$facebook = get_sub_field('facebook');
			$linkedin = get_sub_field('linkedin');
			$twitter = get_sub_field('twitter');
			$vimeo = get_sub_field('vimeo');
			$instagram = get_sub_field('instagram');
			?>
			
				<ul class="social-media">
					<?php if( $twitter ): ?>
						<li><a href="<?php echo $twitter; ?>" target="_blank"><i aria-hidden="true" class="fab fa-twitter"></i></a></li>
					<?php endif;
					if( $instagram ): ?>
						<li><a href="<?php echo $instagram; ?>" target="_blank"><i aria-hidden="true" class="fab fa-instagram"></i></a></li>
					<?php endif;
					if( $linkedin ): ?>
						<li><a href="<?php echo $linkedin; ?>" target="_blank"><i aria-hidden="true" class="fab fa-linkedin"></i></a></li>
					<?php endif;
					if( $facebook ): ?>
						<li><a href="<?php echo $facebook; ?>" target="_blank"><i aria-hidden="true" class="fab fa-facebook-f"></i></a></li>
					<?php endif;
					if( $vimeo ): ?>
						<li><a href="<?php echo $vimeo; ?>" target="_blank"><i aria-hidden="true" class="fab fa-vimeo"></i></a></li>
					<?php endif; ?>
				</ul>
									
			<?php endwhile;		
			endif; ?>
			
			
	 </aside>

</div>

