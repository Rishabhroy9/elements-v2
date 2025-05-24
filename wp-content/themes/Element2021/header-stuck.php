<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="https://use.typekit.net/kaj7kmk.css">
		<script src="https://kit.fontawesome.com/a89585f277.js" crossorigin="anonymous"></script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NZ65J7');</script>
		
		<?php wp_head(); ?>

	</head>
			
	<body <?php body_class(); ?>>
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NZ65J7"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header landing" role="banner">
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
				<?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>

			</header> <!-- end .header -->