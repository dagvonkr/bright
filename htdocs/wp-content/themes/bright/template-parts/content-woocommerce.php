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

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>


      <?php
        function woocommerce_variable_add_to_cart() {
          global $product;

          // Enqueue variation scripts
          wp_enqueue_script( 'wc-add-to-cart-variation' );

          // Load the template
          woocommerce_get_template( 'single-product/add-to-cart/variable.php', array(
                  'available_variations'  => $product->get_available_variations(),
                  'attributes'            => $product->get_variation_attributes(),
                  'selected_attributes'   => $product->get_variation_default_attributes()
              ) );
      } } ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
