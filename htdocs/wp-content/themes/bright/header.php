<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bright
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="site">


	<div id="content" class="site-content">

<div class="menu-wrapper">
    <!-- Nav bar top -->
    <div id="top" class="nav-bar-fixed-top">
      <div class="nav-element logo">
        <a href="#"> BR!GHT </a>
      </div>
      <div class="menu-options-wrapper">
        <div class="nav-element menu-options">
          <a href="#produkt"> Our Products </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#story"> Our Story </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#about"> About Us </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#news"> News </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#contact"> Contact </a>
        </div>
      </div>
    </div>
    <!-- Nav bar sticky -->
    <div class="nav-bar-on-scroll">
      <div class="nav-element logo">
        <a href="#top"> BR!GHT </a>
      </div>
      <div class="menu-options-wrapper">
        <div class="nav-element menu-options">
          <a href="#produkt"> Our Products </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#story"> Our Story </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#about"> About Us </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#news"> News </a>
        </div>
        <div class="nav-element menu-options">
          <a href="#contact"> Contact </a>
        </div>
      </div>
    </div>
  <!-- Hamburger -->
  <div class="hamburger-menu">
    <div class="menu-btn" id="menu-btn" onclick="">
      <div></div>
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="responsive-menu">
        <a href="/about/about" class="about-btn-hamburger">
          About
        </a>
    </div>
  </div>
</div> <!-- menu-wrapper  -->
