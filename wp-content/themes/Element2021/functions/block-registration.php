<?php 
/*
Plugin Name: Element Custom Blocks
Plugin URI: https://element.cc
Description: Custom Gutenberg Blocks
Version: 1.1
Author:	Facta Studio
Author URI: https://factastudio.com
License: GPLv2
*/

function register_acf_block_types() {
    // register Text Slider
    acf_register_block_type(array(
        'name'              => 'text-slider',
        'title'             => __('Text Slider'),
        'description'       => __(''),
		'supports' => array( 'mode' =>false ),
		'mode' 				=> 'edit',
        'render_template'   => '/parts/blocks/text-slider/text-slider.php',
        'category'        => 'facta-blocks',
        'icon'              => 'image-flip-horizontal',
        'keywords'          => array( 'text', 'slider' ),
		'post_types' => array('post', 'page' ),
    ));
    // register new logo ticker block.
    acf_register_block_type(array(
        'name'              => 'logo-array',
        'title'             => __('Logo Array'),
        'description'       => __(''),
		'supports' => array( 'mode' =>false ),
		'mode' 				=> 'edit',
        'render_template'   => 'parts/blocks/logo-array/logo-array.php',
        'category'        => 'facta-blocks',
        'icon'              => 'images-alt2',
        'keywords'          => array( 'logos', 'grid' ),
		'post_types' => array('post', 'page' ),
    ));
    // register double text block.
    acf_register_block_type(array(
        'name'              => 'double-text',
        'title'             => __('Column Text'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/double-text/double-text.php',
        'category'        => 'facta-blocks',
        'icon'              => 'columns',
        'keywords'          => array( 'columns', 'grid' ),
		'post_types' => array('post', 'page' ),
    ));
      // register double text block.
      acf_register_block_type(array(
        'name'              => 'text-grid',
        'title'             => __('Contact Grid'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/text-grid.php',
        'category'        => 'facta-blocks',
        'icon'              => 'grid-view',
        'keywords'          => array( 'contact', 'grid' ),
		'post_types' => array('post', 'page' ),
    ));
    // register animated text media block.
    acf_register_block_type(array(
        'name'              => 'media-text',
        'title'             => __('Animated Media & Text'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/media-text/media-text.php',
        'category'        => 'facta-blocks',
        'icon'              => 'embed-photo',
        'keywords'          => array( 'animated', 'media' ),
		'post_types' => array('post', 'page' ),
    ));
    // register CTA block.
    acf_register_block_type(array(
        'name'              => 'cta-block',
        'title'             => __('Call-to-action'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/cta-block/cta-block.php',
        'category'        => 'facta-blocks',
        'icon'              => 'megaphone',
        'keywords'          => array( 'cta', 'button' ),
		'post_types' => array('post', 'page' ),
    ));
    // register feature reel.
    acf_register_block_type(array(
        'name'              => 'feature-reel',
        'title'             => __('Feature Reel'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/feature-reel/feature-reel.php',
        'category'        => 'facta-blocks',
        'icon'              => 'video-alt3',
        'keywords'          => array( 'video', 'reel' ),
		'post_types' => array('post', 'page' ),
    ));
    // register video feed.
    acf_register_block_type(array(
        'name'              => 'video-feed',
        'title'             => __('Video Feed'),
        'description'       => __(''),
		'supports' => array( 'mode' =>false ),
		'mode' 				=> 'edit',
        'render_template'   => 'parts/blocks/video-feed/video-feed.php',
        'category'        => 'facta-blocks',
        'icon'              => 'format-video',
        'keywords'          => array( 'video', 'feed' ),
		'post_types' => array('post', 'page' ),
    ));
    // register cover text.
    acf_register_block_type(array(
        'name'              => 'cover-text',
        'title'             => __('Cover Text'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/cover-text/cover-text.php',
        'category'        => 'facta-blocks',
        'icon'              => 'embed-photo',
        'keywords'          => array( 'background', 'content' ),
		'post_types' => array('post', 'page' ),
    ));

     // register  Image Slider
     acf_register_block_type(array(
        'name'              => 'image-slider',
        'title'             => __(' Image Slider'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/image-slider/image-slider.php',
        'category'        => 'facta-blocks',
        'icon'              => 'embed-photo',
        'keywords'          => array( 'background', 'content' ),
		'post_types' => array('post', 'page' ),
    ));

         // register  Award Section
         acf_register_block_type(array(
            'name'              => 'awards-section',
            'title'             => __(' Award Section '),
            'description'       => __(''),
            'supports' => array( 'align' =>false ),
            'render_template'   => 'parts/blocks/awards-section/awards-section.php',
            'category'        => 'facta-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'background', 'content' ),
            'post_types' => array('post', 'page' ),
        ));

             // register  Partner Sction 
     acf_register_block_type(array(
        'name'              => 'partner-section',
        'title'             => __('Partner Sction'),
        'description'       => __(''),
		'supports' => array( 'align' =>false ),
        'render_template'   => 'parts/blocks/partner-section/partner-section.php',
        'category'        => 'facta-blocks',
        'icon'              => 'embed-photo',
        'keywords'          => array( 'background', 'content' ),
		'post_types' => array('post', 'page' ),
    ));

         // register  Video Slider
         acf_register_block_type(array(
            'name'              => 'video-slider',
            'title'             => __(' Video Slider'),
            'description'       => __(''),
            'supports' => array( 'align' =>false ),
            'render_template'   => 'parts/blocks/video-slider/video-slider.php',
            'category'        => 'facta-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'background', 'content' ),
            'post_types' => array('post', 'page' ),
        ));

        
         // register  Hero Video
         acf_register_block_type(array(
            'name'              => 'hero-video',
            'title'             => __('Hero Video'),
            'description'       => __(''),
            'supports' => array( 'align' =>false ),
            'render_template'   => 'parts/blocks/hero-video/hero-video.php',
            'category'        => 'facta-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'background', 'content' ),
            'post_types' => array('post', 'page' ),
        ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


function register_acf_block_category($categories, $post){
    return array_merge(
        array(
            array(
                'slug' => 'facta-blocks',
                'title' => __('Element Blocks', 'facta-blocks'),
				'icon'  => 'editor-spellcheck',
            ),
        ),
        $categories
        
    );
}
add_filter('block_categories_all', 'register_acf_block_category', 10, 2);