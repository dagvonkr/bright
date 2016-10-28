<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bright
 */

get_header(); ?>

	<!-- NBNB Article page is only used for the news section -->

	<div class="newsfeed-archive">

		<div class="sub-logo">
			<div class="nav-element logo">
        <a href="#" class="scroll"> BR!GHT </a>
      </div>
		</div>


		<div class="sub-wrapper">

		  <div class="max-width-container">

	      <div class="news-wrapper" id="news">
	        <div class="newsfeed-text header header2">
	          Newsfeed
	        </div>
	        <div class="news-articles news-articles-sub">
	          <?php $loop = new WP_Query( array( 'post_type' => 'news-article', 'posts_per_page' => 12 ) ); ?>
	          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	            <div class="news-article  news-article-archive">
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

	      </div>

	    </div>  <!-- max-width-container -->

		</div> <!-- sub-wrapper -->
	</div>
<?php
// get_sidebar();
get_footer();
