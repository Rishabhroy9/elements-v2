<?php

/**
 * Text Columns Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-columns' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-columns';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$columns_type = get_field('columns_type');
$columns_bg = get_field('columns_bg');
$columns_text = get_field('columns_text');
$columns_width = get_field('columns_width');
$fw_text = get_field('full_width_text');
?>


	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $columns_type; ?> <?php echo $columns_text; ?>" style="background-color:<?php echo $columns_bg; ?>;">
		
		<?php if( get_field('columns_type') == 'single-col'):?>
			
 				<?php if( have_rows('columns_left') ):
					while( have_rows('columns_left') ): the_row();
					$left_title = get_sub_field('left_title');
					$left_wysiwyg = get_sub_field('left_wysiwyg');
					?>
					
				<div class="eleft-column">
					
					<?php if( $left_title ): ?>
						<h2><?php echo $left_title; ?></h2>
			        <?php endif;
					if( $left_wysiwyg ):
						echo $left_wysiwyg;
			        endif; ?>
					
				</div>
					
 			<?php endwhile;
 			endif;?>
			
		<?php elseif( get_field('columns_type') == 'double-col'): ?>
		
		
		
		<div class="block-wrapper">
			
			<?php if( $fw_text ): ?>
				<div class="optional-col-title">
					<?php echo $fw_text; ?>
				</div>
	        <?php endif; ?>
			
			<div class="block-grid <?php echo $columns_text; ?> <?php echo $columns_width; ?>">
				
 				<?php if( have_rows('columns_left') ):
					while( have_rows('columns_left') ): the_row();
					$left_title = get_sub_field('left_title');
					$left_wysiwyg = get_sub_field('left_wysiwyg');
					?>
					
				<div class="eleft-column">
					
					<?php if( $left_title ): ?>
						<h2 class="dedicated"><?php echo $left_title; ?></h2>
			        <?php endif;
					if( $left_wysiwyg ):
						echo $left_wysiwyg;
			        endif; ?>
					
				</div>
					
 			<?php endwhile;
 			endif;
	 		if( have_rows('columns_right') ):
				while( have_rows('columns_right') ): the_row();
					$right_wysiwyg = get_sub_field('right_wysiwyg');
					?>
					
					<div class="eright-column">
					
						<?php if( $right_wysiwyg ):
							echo $right_wysiwyg;
				        endif; ?>
						
						
				 		<?php if( have_rows('right_list') ): ?>
							<ul class="hover-special">
							<?php while( have_rows('right_list') ): the_row();
								$right_list_title = get_sub_field('right_list_title');
								$right_list_hover = get_sub_field('right_list_hover');
								?>
					
								<li>	
									<h6><?php echo $right_list_title; ?></h6>
									<p><?php echo $right_list_hover; ?></p>
									<span></span>
								</li>
					
				 			<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					
					</div>
					
	 			<?php endwhile;
	 			endif; ?>
				
				</div><!--END .block-grid -->
				
			</div><!--END .block-wrapper -->
			
		<?php endif; ?>
			
		</div><!--END .text-columns -->					