<?php

/**
 * Text Grid Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-grid' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$show_contact = get_field('show_contact');
$grid_bg_image = get_field('grid_bg_image');
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url(<?php echo $grid_bg_image; ?>);">
<div class="dark-overlay"></div>

<div class="contact-grid-shell">

    <?php if( have_rows('full_grid') ):
        while( have_rows('full_grid') ): the_row();
        $grid_width = get_sub_field('number_of_columns');
        ?>
            <div class="contact-grid">

            <?php if( have_rows('contact_repeater') ):
            while( have_rows('contact_repeater') ): the_row();
            $grid_title = get_sub_field('grid_title');
            $grid_subtitle = get_sub_field('grid_subtitle');
            $grid_wysiwyg = get_sub_field('grid_wysiwyg');
            $grid_link = get_sub_field('grid_link');
            ?>
					
                <div class="contact-cell <?php echo $grid_width; ?>">
                <?php
                if( $grid_link ):
			        $link_url = $grid_link['url'];
			        $link_title = $grid_link['title'];
			        $link_target = $grid_link['target'] ? $grid_link['target'] : '_self'; 
                    ?>
                    <h2><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $grid_title; ?></a></h2>
                <?php else: ?>
                    <h2><?php echo $grid_title; ?></h2>
                <?php endif;?>
                    
                    <?php
                    if( $grid_subtitle ): ?>
                        <h3><?php echo $grid_subtitle; ?></h3>
                    <?php endif;
                    if( $grid_wysiwyg ):
                        echo $grid_wysiwyg;
                    endif; ?>
                    
                </div><!-- end .contact-cell -->
					
 			<?php endwhile;
            endif;?>

            </div><!-- end .contact-grid -->

            <?php endwhile;
            endif; 
            if( $show_contact ): ?>

            <div class="contact-grid footer-version">

                <div class="contact-cell grid-3 inner-flex">

                    <div class="hq">HQ</div>
                    <div>
                    <?php
                    if ( get_field( 'physical_address', 'option')):
                        echo get_field('physical_address', 'option');
                    endif;
                    if ( get_field( 'phone', 'option')): ?>
			            <p><a href="tel:<?= get_field('phone', 'option'); ?>"><?= get_field('phone', 'option'); ?></a></p>
		            <?php endif;?>
                    </div> 
                </div>

                <div class="contact-cell grid-3">

                        <?php if ( get_field( 'cities', 'option')): ?>
								<h6 class="text-center">
									<?= get_field('cities', 'option'); ?>
								</h6>
							 <?php endif; ?>

                        <?php
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

                            </div>
                            <div class="contact-cell grid-3">
                            <?php
							if ( get_field( 'email', 'option')): ?>
								<p><a href="mailto:<?= get_field('email', 'option'); ?>"><?= get_field('email', 'option'); ?></a></p>
							<?php endif;?>
                            <?php
							if ( get_field( 'email_interns', 'option')): ?>
								<p><a href="mailto:<?= get_field('email_interns', 'option'); ?>"><?= get_field('email_interns', 'option'); ?></a></p>
							<?php endif;?>
                            

                            </div>

                    </div><!-- end .contact-grid footer-version -->

                    <?php endif;?>

        </div><!-- end .contact-grid-shell -->
			
		</div><!--END .text-grid -->					