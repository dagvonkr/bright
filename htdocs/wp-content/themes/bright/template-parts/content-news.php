<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bright
 */

?>



<div class="max-width-container">

  <div class="sub-wrapper">
    <!-- Headliner -->


    <div class="top-image-header-wrapper">
      <div class="sub-header">
        <?php
          if ( is_single() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
          } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );}
        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
          <?php bright_posted_on(); ?>
        </div><!-- .entry-meta -->

        <?php
        endif; ?>

      </div><!-- .sub-header -->

      <!-- Image -->
      <div class="sub-image">

       <?php
        $image = get_field('news-image');
        if( !empty($image) ): ?>
          <img src="<?php echo $image ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>

      </div> <!-- sub-image -->
    </div> <!-- top-image-header-wrapper -->

    <div class="sub-date">
      <?php echo get_the_date('j. F Y'); ?> <!-- ('F j, Y') -->
    </div>

    <div class="sub-fotokred">
      <?php echo get_field('foto_kred'); ?>
    </div>

     <!-- Ingress -->
    <div class="sub-content">
      <?php

        the_content( sprintf(
          /* translators: %s: Name of current post. */
          wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bankaxept' ), array( 'span' => array( 'class' => array() ) ) ),
          the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bankaxept' ),
          'after'  => '</div>',
        ) );
      ?>

    </div><!-- .sub-content -->

  </div>

</div> <!-- max-width-container -->

  <footer class="entry-footer">
    <?php bright_entry_footer(); ?>
  </footer><!-- .entry-footer -->

