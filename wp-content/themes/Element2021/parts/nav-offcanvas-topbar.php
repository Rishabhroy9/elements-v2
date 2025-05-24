<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>
 
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid align-items-start">     
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                if ( $custom_logo_id ) {
                    echo wp_get_attachment_image( $custom_logo_id , 'full', false, array( 'class' => 'img-fluid logo', 'alt' => 'logo' ) );
                } else {
                    echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/logo.webp" alt="logo" class="img-fluid logo">';
                }
                ?>
            </a>

            <button class="btn navbar-toggler" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample"
                role="button" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <!-- ✅ Offcanvas Menu (Only Dynamic Menu) -->
            <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">

                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'offcanvas-nav',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav mb-2 mb-lg-0',
                    'fallback_cb'     => false,
                    'depth'           => 2,
                    'walker'          => new Off_Canvas_Menu_Walker()
                ));
                ?>
            </div>

        </div>
    </nav>
</header>

