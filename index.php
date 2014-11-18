<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package temeitor
 */
get_header(); ?>is_page
  <div id="primary" class="content-area col-md-9">
    <main id="main" class="site-main pinteresco" role="main">
    <?php if ( have_posts() ) : ?>
      <?php get_template_part('loop') ?>
    <?php else : ?>
      <?php get_template_part( 'loop', 'none' ); ?>
    <?php endif; ?>
    </main><!-- #main -->
  </div><!-- #primary -->

  <div id="sidebar" class="col-md-3">
    <?php get_sidebar(); ?>
  </div>
  
<?php get_footer(); ?>