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
<div class="main-content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- <?php echo do_shortcode( '[contact-form-7 id="28" title="Contact form 1"]' ); ?> -->


			<div class="top-image-wrapper">
				<img class="top-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/top-image.png" />
			</div>


		<!-- PRODUCTS -->

			<div class="produkt-wrapper" id="produkt">

					<?php $loop = new WP_Query( array( 'post_type' => 'produkter', 'posts_per_page' => 4 ) ); ?>

					<?php
         		$c = 0; // set up a counter so we know which post we're currently showing
         		$extra_class = 'produkt-even'; // set up a variable to hold an extra CSS class
         		$extra_class_text = 'produkt-even-text';
         		$extra_class_image = 'produkt-even-image';
         		$extra_class_readmore = 'produkt-even-readmore';
         	?>

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


	         <?php
	         	$c++; // increment the counter
	         	if( $c % 2 != 0) {
		  			// we're on an odd post
		   			$extra_class = 'produkt-odd';
		   			$extra_class_text = 'produkt-odd-text';
		   			$extra_class_image = 'produkt-odd-image';
		   			$extra_class_readmore = 'produkt-odd-readmore';
	         } else {
	         $extra_class = 'produkt-even';
	         $extra_class_text = 'produkt-even-text';
	         $extra_class_image = 'produkt-even-image';
	         $extra_class_readmore = 'produkt-even-readmore';
	       		}
	         ?>

	      <div id="post-<?php the_ID(); ?>" <?php post_class($extra_class) ?> >

					<div <?php post_class($extra_class_text) ?> >
						<div class="produkt-front-text-header header">
							<?php
							echo mb_strimwidth( get_the_title(), 0, 70, '...');
							?>
						</div>
						<br>
						<div class="produkt-front-text-ingress small-text">
							<?php
							echo mb_strimwidth( get_the_content(), 0, 400, '...');
							?>
						</div>
					</div>

				<div <?php post_class($extra_class_image) ?>>
					<div class="fadein">
						<?php
						$image = get_field('produkt_hovedbilde');
						if( !empty($image) ): ?>
							<div class="produkt-front-image">
								<img class="produkt-front-image-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div> <!-- <?php post_class($extra_class_text) ?> -->
				</div>

				<a href="#content<?php echo ($c); ?>" class="btn-collapse btn-collapse--scroll" data-container-expanded="false">
					<img <?php post_class($extra_class_readmore) ?> src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-white.png" />
				</a>


				<div id="content<?php echo ($c); ?>" style="display: none" class="collapse-container" data-expanded="false">


					<div class="top-image-wrapper">
						<img class="top-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/bright-big-img-2.png" />
					</div>
					<!-- 		<div class="produkt-carousel">
              <p>01 dette er en slide hei hei 01</p>
              <p>02 dette er en slide hei hei 02</p>
              <p>03 dette er en slide hei hei 03</p>
              <p>04 dette er en slide hei hei 04</p>
          </div> -->
					<div class="produkt-carousel-wrapper fadein">
					  <?php
					  // check if the repeater field has rows of data
					  if( have_rows('produkt_bilder') ):

					    echo '<div class="produkt-carousel">';

					    // loop through the rows of data
					    while ( have_rows('produkt_bilder') ) : the_row();
					      $image = get_sub_field('bilde');
					      $produktURL = get_permalink($produkt->ID);
					  ?>

					    <div class="gallery-images">

					    <div><img class="gallery-image" src="<?php echo $image; ?>"/></div>
					    </div>

					  <?php
					    endwhile;
					    echo '</div>';
					  else :
					    // no rows found
					  endif;
					  ?>
					</div> <!-- produkt-carousel-wrapper -->
			<div class="lamp-info-wrapper">
				<div class="left-product-subinfo">
					<div class="left-text">
						<?php
							echo mb_strimwidth( get_field('ingress'), 0, 100, '...');
						?>
					</div>
				</div>
				<div class="right-product-subinfo">
					<div class="description">
						<div class="description-header">
							Description
						</div>
						<?php
							echo mb_strimwidth( get_field('description'), 0, 600, '...');
						?>
					</div>

				<div class="technical-specs">
					<div>
						<a href="#content12" class="btn-collapse" data-container-expanded="false">
							Technical specification
						</a>
						<div id="content12" style="display: none" class="collapse-container" data-expanded="false">
							<div class="collapse-wrapper-inner">
								<?php
							echo mb_strimwidth( get_field('technical_description'), 0, 1000, '...');
						?>

								<div>
									<a href="#content12" class="btn-collapse" data-container-expanded="false">
										<span class="text-less">See Less</span>
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="light">
					<div>
						<a href="#content13" class="btn-collapse" data-container-expanded="false">
							Light
						</a>
						<div id="content13" style="display: none" class="collapse-container" data-expanded="false">
							<div class="collapse-wrapper-inner">
								<?php
							echo mb_strimwidth( get_field('light'), 0, 1000, '...');
						?>

								<div>
									<a href="#content13" class="btn-collapse" data-container-expanded="false">
										<span class="text-less">See Less</span>
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>


			</div>	<!-- right-product-subinfo -->
			</div> <!-- lamp-info-wrapper -->
				</div> <!-- content1 -->

				<?php endwhile; wp_reset_query(); ?>
			</div> <!-- produkt-wrapper -->


			<!-- ABOUT -->

			<div class="about-wrapper" id="about">
				<section>
					<ul class="profiles">
						<li>
							<a href="#" class="profile--item" data-content="
							Otto Kalvø is a Norwegian-born telecom veteran. In 1989, he entered Telenor, the leading telecom company in Scandinavia. In Telenor he had the main responsibility to run the hardware distribution unit. He acquired this unit in 1997, with the help of Fleggaard Group and his business partner Jan G. Næss, and established Dangaard Telecom. Dangaard Telecom became Europe's largest mobile phone distributor and merged in 2007 with US based Brightpoint, forming the largest mobile phone distributor in the world. During this period, Otto established several successful companies, including Moobi Telecom, Scandinavia's largest and most successful online retailshop for mobile phones. Otto is currently the founder and COO of Moota Telecom, in addition to being an active investor and board member in several companies. He holds an MBA from University of Alabama, USA.">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-content="Otto Kalvø is a Norwegian-born telecom veteran. In 1989, he entered Telenor, the leading telecom company in Scandinavia. In Telenor he had the main responsibility to run the hardware distribution unit. He acquired this unit in 1997, with the help of Fleggaard Group and his business partner Jan G. Næss, and established Dangaard Telecom. Dangaard Telecom became Europe's largest mobile phone distributor and merged in 2007 with US based Brightpoint, forming the largest mobile phone distributor in the world. During this period, Otto established several successful companies, including Moobi Telecom, Scandinavia's largest and most successful online retailshop for mobile phones. Otto is currently the founder and COO of Moota Telecom, in addition to being an active investor and board member in several companies. He holds an MBA from University of Alabama, USA.">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-content="text 3">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-content="text 4">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-content="text 5">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-expanded="false" data-content="text 6">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-content="text 7">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>
						<li>
							<a href="#" class="profile--item" data-expanded="false" data-content="text 8">
								<img class="board-image" src="http://dummyimage.com/100x100/808080/ffffff"/>
							</a>
						</li>

					</ul>
				</section>

			</div> <!-- about-wrapper -->


			<!-- NEWS -->

			<div class="news-wrapper" id="news">
				<div class="newsfeed-text">
					Newsfeed
				</div>
				<div class="news-articles">
					<?php $loop = new WP_Query( array( 'post_type' => 'news-article', 'posts_per_page' => 3 ) ); ?>
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
						</div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
				<button class="more-news-text">
					<a href="#"> More news</a>
				</button>

			</div>


			<div class="distributors-wrapper">
				<img class="distributors-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/top-image.png" />
			</div>

			<div id="contact">

				<div class="newsletter-and-map-wrapper">
					<div class="newsletter-wrapper">

					</div>
					<div class="map-wrapper">

					</div>

				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- main-content-wrapper -->
<?php get_footer() ?>
