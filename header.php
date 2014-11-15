<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package temeitor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
  <?php dynamic_sidebar('sidebar-1') ?>

  <header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
      <h2 class="site-description">
        <?php bloginfo( 'description' ); ?>
      </h2>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mi_menu">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <?php wp_nav_menu( array( 
                          'theme_location' => 'principal',
                          'container'       => 'div',
                          'container_class' => 'collapse navbar-collapse',
                          'container_id'    => 'mi_menu',
                          'menu_class'      => 'nav navbar-nav',
                          'menu_id'         => 'menu-primary'
                         ) 
                       ); ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="content" class="site-content row">
