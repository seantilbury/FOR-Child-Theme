<?php

add_action( 'wp_enqueue_scripts', 'storefront_parent_theme_enqueue_styles' );

function storefront_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'typeoffun-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'storefront-style' )
    );

}


add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} 

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) ?>
		  <?php echo date("Y"); ?> 
	</div><!-- .site-info -->
	<?php
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 30 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 30;
  return $cols;
}
