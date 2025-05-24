<?php
/**
 * The template part for displaying the hero
 */
?>

<?php if (has_post_thumbnail($post->ID, 'full')):
	global $post;
	$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', true, '');
	$hide_h1 = get_field('hide_h1');
	?>

	<header class="page-header <?php if (get_field('alternate_title')): ?>uses-alternate<?php endif; ?>"
		style="background-image: url(<?php echo $src[0]; ?> );">

		<?php if (get_field('hero_video')): ?>

			<div class="video-wrap">
				<video playsinline autoplay muted loop poster="">
					<source src="<?= get_field('hero_video'); ?>" type="video/mp4">
				</video>
			</div>
 

		<?php endif; ?>

		<div class="header-overlay"></div>

		<?php if (get_field('notext_image')): ?>
			<div class="no-title">
				<img src="<?= get_field('notext_image'); ?>" />
			</div>
		<?php elseif (get_field('alternate_title')): ?>

			<div class="alternate-title">
				<h1 class="page-title"><?= get_field('alternate_title'); ?></h1>
			</div><!-- end .alternate-title -->

		<?php else:
			if ($hide_h1):
				the_title('<h1 class="page-title on-load screen-reader-text">', '</h1>');
			else:
				the_title('<h1 class="page-title on-load">', '</h1>');
			endif;
		endif; ?>

	</header> <!-- end .page-header -->

<?php endif; ?>