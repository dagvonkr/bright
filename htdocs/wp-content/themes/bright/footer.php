<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bright
 */

?>

	</div><!-- #content -->

	<div class="footer">
    <div class="footer-content">Bright Products AS</div>
    <div class="footer-content">
        Address<br>
      <div class="footer-content-2">Hoffsveien 17a</div>
      <div class="footer-content-2"> 0275 Oslo, Norway </div>
    </div>
    <div class="footer-content">
      Contact <br>
      <div class="footer-content-3">  info@bright-products.com <br></div>
      +47 92 44 25 46
    </div>
    <div class="footer-content">
      <div class="footer-content-4">
        <a href="">
          <img class="some-img" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/face.png"/>
        </a>
      </div>
      <div class="footer-content-4">
        <a href="" class="some-img">
          <img class="some-img" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/twitter.png"/>
        </a>
      </div>
      <div class="footer-content-4">
        <a href="" class="some-img">
          <img class="some-img" src="<?php bloginfo('url');?>/wp-content/themes/bright/img/vimeo.png"/>
        </a>
      </div>
    </div>

	</div><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
