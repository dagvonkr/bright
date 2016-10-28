<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bright
 */

get_header(); ?>

    <div class="max-width-container">
      <div class="news-wrapper" id="news">
        <div class="newsfeed-text">
          Newsfeed
        </div>
        <div class="news-articles">
          <?php $loop = new WP_Query( array( 'post_type' => 'news-article', 'posts_per_page' => 12 ) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="news-article">
              <div class="news-image">
                <?php
                $image = get_field('news-image');
                if( !empty($image) ): ?>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>"/>
                  </a>
                <?php endif; ?>
              </div>

              <div class="news-header">
                <?php
                echo mb_strimwidth( get_the_title(), 0, 70, '...');
                ?>
              </div>

              <div class="news-date">
                <?php echo get_the_date('F j, Y'); ?>
              </div>
            </div> <!-- news-article -->
          <?php endwhile; wp_reset_query(); ?>

        </div> <!-- news-articles -->
      <div class="more-news-button-wrapper">
        <a href="#">
          <button class="more-news-button">
            More news
          </button>
        </a>
      </div>

      </div>
    </div>  <!-- max-width-container -->

<?php get_footer() ?>