<?php
function site_scripts()
{
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  wp_enqueue_script('splide-js', get_template_directory_uri() . '/assets/scripts/splide.min.js', array('jquery'), null);

  // Adding scripts file in the footer
  wp_enqueue_script('site-js', get_template_directory_uri() . '/dist/site-bundle.js', array('jquery'), filemtime(get_template_directory() . '/assets/scripts/js'), true);

  // Register main stylesheet
  wp_enqueue_style('site-css', get_template_directory_uri() . '/dist/site-styles.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all');
  wp_enqueue_style('splide-core.min', get_template_directory_uri() . '/assets/styles/splide-core.min.css', array('site-css'), null);

  // Comment reply script for threaded comments
  if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply');
  }

  // Enqueue jQuery (already included by WordPress)
  wp_enqueue_script('jquery');

  // Enqueue Bootstrap CSS
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css', array(), '5.3.5', 'all');

  // Enqueue Bootstrap Icons CSS
  wp_enqueue_style('bootstrap-icons-css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css', array(), '1.12.1', 'all');

  // Enqueue Slick Carousel
  wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
  wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', [], '1.8.1');

  wp_enqueue_script('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);
  // Enqueue GSAP
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array(), '3.9.1', true);

  // Slick Carousel CSS
  wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], '1.9.0');

  // Slick Carousel JS
  wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['jquery'], '1.9.0', true);

  // Enqueue Bootstrap JS
  wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js', array('jquery'), null, false);

  // Enqueue Slick Carousel JS
  wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, false);

  // Enqueue your custom script
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/scripts/script.js', array('jquery', 'bootstrap', 'slick'), null, false);

  wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/styles/home.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

function facta_conditional_scripts()
{
  if (is_page('work')) {
    wp_enqueue_script('facet-splides-js', get_template_directory_uri() . '/assets/scripts/facet-splides.js', array('jquery'), '1.0');
  } else {
    wp_enqueue_script('plain-splides-js', get_template_directory_uri() . '/assets/scripts/plain-splides.js', array('jquery'), '1.0');
  }
}
add_action('wp_print_scripts', 'facta_conditional_scripts'); // Add Conditional Page Scripts