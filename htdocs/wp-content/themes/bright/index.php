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


<div class="menu-wrapper">
    <!-- Nav bar top -->
    <div id="top" class="nav-bar-fixed-top">
      <div class="nav-element logo">
        <a href="#" class="scroll"> BR!GHT </a>
      </div>
      <div class="menu-options-wrapper">
        <div class="nav-element menu-options">
          <a href="#produkt" class="scroll"> Our Products </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#story" class="scroll"> Our Story </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#about" class="scroll"> About Us </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#news" class="scroll"> News </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#contact" class="scroll"> Contact </a>
        </div>
      </div>

              <!-- Hamburger -->
      <div class="hamburger-menu">
        <div class="menu-btn" id="menu-btn" onclick="">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="responsive-menu">
          <div class="hamburger-options-wrapper">
            <div class="hamburger-element hamburger-options">
              <a href="#produkt" class="scroll"> Our Products </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#story" class="scroll"> Our Story </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#about" class="scroll"> About Us </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#news" class="scroll"> News </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#contact" class="scroll"> Contact </a>
            </div>
          </div> <!-- hamburger-wrapper-options -->
        </div>
      </div>
    </div>


    <!-- Nav bar sticky -->
    <div class="nav-bar-on-scroll">
      <div class="nav-element logo">
        <a href="#top" class="scroll"> BR!GHT </a>
      </div>
      <div class="menu-options-wrapper">
        <div class="nav-element menu-options">
          <a href="#produkt" class="scroll"> Our Products </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#story" class="scroll"> Our Story </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#about" class="scroll"> About Us </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#news" class="scroll"> News </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#contact" class="scroll"> Contact </a>
        </div>
      </div>

      <!-- Hamburger -->
      <div class="hamburger-menu">
        <div class="menu-btn-on-scoll menu-btn" id="menu-btn" onclick="">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="responsive-menu responsive-menu-on-scroll">
          <div class="hamburger-options-wrapper">
            <div class="hamburger-element hamburger-options">
              <a href="#produkt" class="scroll"> Our Products </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#story" class="scroll"> Our Story </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#about" class="scroll"> About Us </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#news" class="scroll"> News </a>
            </div>
            <div class="hamburger-element hamburger-options">
              <a href="#contact" class="scroll"> Contact </a>
            </div>
          </div> <!-- hamburger-wrapper-options -->
        </div>
      </div>
    </div>

</div> <!-- menu-wrapper  -->


<div class="main-content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- <?php echo do_shortcode( '[contact-form-7 id="28" title="Contact form 1"]' ); ?> -->


		<div class="top-image-wrapper">
			<div class="top-image-text">
				Light makes everything <br> visible.
			</div>
			<img class="top-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/top-image.png" />
		</div>


	<!-- Testing proucts -->

	<!-- Finish Testing proucts -->


		<!-- PRODUCTS -->

			<div class="produkt-wrapper" id="produkt">

        <?php
          $params = array('posts_per_page' => 5, 'post_type' => 'product');
          $wc_query = new WP_Query($params);
          ?>

				<?php
       		$c = 0; // set up a counter so we know which post we're currently showing
       		$c_technical_specification = 100; // not have the same count number as parent
       		$c_light = 200; // with this nested collapse/expand too
       		$extra_class = 'produkt-even'; // set up a variable to hold an extra CSS class
       		$extra_class_text = 'produkt-even-text';
       		$extra_class_image = 'produkt-even-image';
       		$extra_class_readmore = 'produkt-even-readmore';
       	?>

       	 <?php if ($wc_query->have_posts()) : ?>
         <?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>


         <?php

         	$c++; // increment the counter
					$c_technical_specification++;
       		$c_light++;

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

         <?php

         ?>

		<div class="max-width-container">
			<div class="product-wrapper-inner">
	      <div id="post-<?php the_ID(); ?>" <?php post_class($extra_class) ?> >
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
						<div class="readmore">
						 <a href="#content<?php echo ($c); ?>" class="btn-collapse btn-collapse--scroll" data-container-expanded="false">
              <div class="produkt-odd-readmore">
                <img class="plus" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-white.png" />
                <div class="readmore-text"> See more </div>
              </div>
             </a>
						</div>
					</div>
				</div>
      <div id="content<?php echo ($c); ?>" style="display: none" class="collapse-container" data-expanded="false">

      		<div class="top-image-wrapper">
      			<img class="top-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/bright-big-img-2.png" />
      		</div>


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
					  	  <img class="gallery-image" src="<?php echo $image; ?>"/>
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

				<div class="right-product-subinfo-collapse">
					<div class="technical-specs">

						<a href="#content<?php echo ($c_technical_specification); ?>" class="btn-collapse" data-container-expanded="false">
						  <img class="plus-small" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-white.png" />
							<span class="btn-collapse-inner">
								Technical specification
							</span>
						</a>

						<div id="content<?php echo ($c_technical_specification); ?>" style="display: none" class="collapse-container" data-expanded="false">
							<div class="collapse-wrapper-inner">
								<div class="technical-specs-inner">
									<?php
    								echo mb_strimwidth( get_field('technical_description'), 0, 1000, '...');
  								?>
                </div>
							</div>

							<a href="content<?php echo ($c_technical_specification); ?>" class="btn-collapse" data-container-expanded="false">
								<span class="text-less">Hide</span>
							</a>
						</div> <!-- $c_technical_specification -->

					</div> <!-- technical-specs -->

					</div>

					<div class="light">
						<a href="#content<?php echo ($c_light); ?>" class="btn-collapse" data-container-expanded="false">
							<img class="plus-small" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-white.png" />
							<span class="btn-collapse-inner">
								Light
							</span>
						</a>
						<div id="content<?php echo ($c_light); ?>" style="display: none" class="collapse-container" data-expanded="false">
							<div class="collapse-wrapper-inner">
								<div class="light-inner">
									<?php
										echo mb_strimwidth( get_field('light'), 0, 1000, '...');
									?>
								</div>
								<div>
									<a href="#content<?php echo ($c_light); ?>" class="btn-collapse" data-container-expanded="false">
									<span class="text-less">Hide</span>
								</a>
								</div>
							</div>
						</div> <!-- $c_light -->
					</div> <!-- light -->
				</div> <!-- right-product-subinfo-collapse -->
			</div> <!-- right-product-subinfo -->
		</div> <!-- lamp-info-wrapper -->

  			<div class="readmore">
  				<a href="#content<?php echo ($c); ?>" class="btn-collapse btn-collapse--scroll" data-container-expanded="false">
  				<img class="plus" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-white.png" />
  					<div class="readmore-text">See less</div>
  				</a>
  			</div>

			</div> <!-- ?? -->
		</div>	<!-- max-width-container -->
	</div> <!-- content($c) -->

	      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

	</div> <!-- produkt-wrapper -->


  <!-- Our Story -->

<div class="about-our-story-wrapper">

  <div class="our-story-background">
		<div class="max-width-container">
			<?php $loop = new WP_Query( array( 'post_type' => 'our-story', 'posts_per_page' => 1 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="our-story-wrapper">
					<div class="our-story-top" id="our-story">
  					<div class="produkt-odd-image">
							<?php
					      $image = get_field('our_story_image');
					      if( !empty($image) ): ?>
									<div class="produkt-front-image">
					        	<img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" class="about-image"/>
					        </div>
					    <?php endif; ?>
						</div>

						<div class="produkt-odd-text about-front-text">
							<div class="produkt-front-text-header our-story-header header about-front-header">
								<?php
      						echo mb_strimwidth( get_the_title(), 0, 70, '...');
      					?>
							</div>

							<div class="produkt-front-text-ingress small-text">
								<?php
      						echo mb_strimwidth( get_field('our_story_sub_title'), 0, 150, '...');
      					?>
							</div>

              <div class="readmore readmore-about">
                <a href="#content-our-story" class="btn-collapse btn-collapse-2-scroll" data-container-expanded="false">
                  <div class="produkt-odd-readmore">
                    <img class="plus" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-green.png" />
                      <div class="readmore-text readmore-text-ourstory"> See more </div>
                  </div>
                </a>
              </div>

						</div>

					</div> <!-- our-story-top -->

        	<div id="content-our-story" style="display: none" class="collapse-container collapse-container-our-story" data-expanded="false">

						<div class="about-ingress-and-body">
							<div class="about-ingress body-copy">
								<?php
	              	echo mb_strimwidth( get_field('our_story_ingress'), 0, 200, '...');
	            	?>
							</div>

							<div class="about-body small-text">
								<?php
	              	echo mb_strimwidth( get_field('our_story_body'), 0, 800, '...');
	            	?>
							</div>
						</div>
					</div> <!-- content-our-story" -->
				</div> <!-- our-story-wrapper -->
					<?php endwhile; wp_reset_query(); ?>

		</div>  <!-- max-width-container stopps here for the scrolling in app.js -->
  </div> <!-- our-story-background -->
			<!-- About -->

		<div class="max-width-container">
			<?php $loop = new WP_Query( array( 'post_type' => 'about-us', 'posts_per_page' => 1 ) ); ?>

  			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="about-wrapper">

  				<div class="about-top" id="about">
						<div class="produkt-even-image">
							<?php
					      $image = get_field('about_us_image');
					      if( !empty($image) ): ?>
									<div class="produkt-front-image">
					        	<img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" class="about-image"/>
					        </div>
					    <?php endif; ?>
						</div>

						<div class="produkt-even-text about-front-text">
							<div class="about-header produkt-front-text-header header">
								<?php
      						echo mb_strimwidth( get_the_title(), 0, 70, '...');
      					?>
							</div>

							<div class="produkt-front-text-ingress small-text">
								<?php
      						echo mb_strimwidth( get_field('about_us_sub_title'), 0, 150, '...');
      					?>
							</div>


            <div class="readmore readmore-about">
              <a href="#content-about" class="btn-collapse btn-collapse-2-scroll" data-container-expanded="false">
                <div class="produkt-odd-readmore">
                  <img class="plus" data-alt-src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-black.png"  src="<?php bloginfo('url');?>/wp-content/themes/bright/img/plus-red.png" />
                  <div class="readmore-text readmore-text-see-more"> See more </div>
                </div>
              </a>
            </div>

					</div>


					</div> <!-- about-wrapper -->

        	<div id="content-about" style="display: none" class="collapse-container collapse-container-about" data-expanded="false">

						<div class="about-ingress-and-body">
							<div class="about-ingress body-copy">
								<?php
                	echo mb_strimwidth( get_field('about_us_ingress'), 0, 200, '...');
              	?>
							</div>

							<div class="about-body small-text">
								<?php
                	echo mb_strimwidth( get_field('about_us_body'), 0, 800, '...');
              	?>
							</div>
						</div>

        	</div> <!-- content-about" -->

				</div> <!-- about-wrapper -->
				<?php endwhile; wp_reset_query(); ?>

		</div>  <!-- max-width-container stopps here for the scrolling in app.js -->
	</div> <!-- max-width-container -->

			<!-- PEOPLE -->


		<div class="max-width-container">

			<div class="people-wrapper" id="people">

				<div class="header2 header">Managment &amp; <br> board </div>

        <section>
          <ul class="profiles">

          <?php $loop = new WP_Query( array( 'post_type' => 'people', ' posts_per_page' => 8 ) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <li>
							<div>
              <a href="#" class="profile--item " data-content="<?php
              	// echo '<div class="biography">';
                echo mb_strimwidth( get_field('biography'), 0, 800, '...');
								// echo '</div>'; ?>" >
              <?php
                $image = get_field('people-image');
                if( !empty($image) ): ?>
<!--                 	<div class="profile-img-overlay">
                	</div> -->
									<img class="board-image" src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>"/>

              <?php endif; ?>

              </a>
              </div>
              <div class="board-name">
	            	<?php
	                echo mb_strimwidth( get_the_title(), 0, 100, '...');
	               ?>
							</div>
							<div class="board-title">
              	<?php
                	echo mb_strimwidth( get_field('position'), 0, 100, '...');
               	?>
							</div>
            </li>


          <?php endwhile; wp_reset_query(); ?>
          </ul>
        </section>

      </div> <!-- people-wrapper -->
		</div> <!-- max-width-container -->

			<!-- NEWS -->
	<div class="news-background-container">
		<div class="max-width-container">
			<div class="news-wrapper" id="news">
				<div class="newsfeed-text header header2">
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
						</div> <!-- news-article -->
					<?php endwhile; wp_reset_query(); ?>

				</div> <!-- news-articles -->
			<div class="more-news-button-wrapper">
				<a href="/news-article">
					<button class="more-news-button">
						More news
					</button>
				</a>
			</div>

			</div>
		</div>	<!-- max-width-container -->
	</div> <!-- news-background-container -->

			<div class="distributors-wrapper">
				<img class="distributors-image" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/top-image.png" />
			</div>



			<div id="contact">

				<div class="newsletter-and-map-wrapper">

					<div class="newsletter-wrapper">

            <div class="newsletter-header header2">
              Sign up for our
            <br>
            newsletter
          </div>
						<?php
	          	echo do_shortcode('[mc4wp_form id="133"]');
	        	?>
					</div>

					<div class="map-wrapper">
						<div id="map">
              <div class="map-overlay"></div>
            </div>
					</div>

				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- main-content-wrapper -->
<?php get_footer() ?>
