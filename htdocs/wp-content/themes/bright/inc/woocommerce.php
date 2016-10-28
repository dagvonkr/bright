<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bright
 */


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



function bright_wrapper_start() {
    echo '&lt;div id="primary" class="content-area"&gt;';
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );


add_action( 'woocommerce_before_main_content', 'bright_wrapper_start', 10 );



function bright_wrapper_end() {
    echo '&lt;/div&gt;';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'bright_wrapper_end', 10 );








