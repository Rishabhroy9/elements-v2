<?php

/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<?php
	$terms = wp_get_object_terms($post->ID, 'category');
	if (!empty($terms)) {
		foreach ($terms as $term) {
			$cat_image = get_field('category_image', $term);
		}
	} ?>
	<header class="page-header uses-alternate" style="background-image: url(<?php echo $cat_image; ?>);">

		<div class="header-overlay"></div>

		<div class="header-content">

			<div class="page-title"><?php $cat_name = get_the_term_list($post->ID, 'category', '', ', ', ''); echo strip_tags($cat_name); ?></div>

		</div>

	</header>

	<section class="entry-content basic" itemprop="text">
		<div class="featured-title">
			<div class="featured-inner">
				<?php the_title('<h1>', '</h1>') ?>
			</div>
			<?php the_post_thumbnail('large'); ?>
		</div>
		<?php the_content();
		$related_posts = get_field('related_posts');
		if ($related_posts) : ?>

			<div class="related-wrap">
				<div class="cause"></div>
				<h2>Worth the read-</h2>

				<div class="grid-x related-posts">
					<?php foreach ($related_posts as $related_posts) :
						$title = get_the_title($related_posts->ID);
						$excerpt = get_the_excerpt($related_posts->ID);
						$permalink = get_permalink($related_posts->ID);
						$thumb = get_the_post_thumbnail_url($related_posts->ID, 'related-thumb');
					?>

						<div class="small-12 medium-6 trigger cell">
							<div class="cause"></div>
							<a href="<?php echo $permalink; ?>" rel="bookmark">
								<img src="<?php echo $thumb; ?>" />
								<h3><?php echo $title; ?></h3>
								<p><?php echo $excerpt; ?></p>
							</a>
						</div>

					<?php endforeach; ?>

				</div><!-- end .related-posts -->

			<?php endif; ?>

			</div><!-- end .related-wrap -->

			<div class="button-2"><a href="/news">Back to News</a></div>

	</section> <!-- end article section -->

</article> <!-- end article -->