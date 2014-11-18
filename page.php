<?php get_header(); ?>
  <div id="primary" class="content-area col-md-12">
    <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
      <?php get_template_part('loop', 'single') ?>
    <?php else : ?>
      <?php get_template_part( 'loop', 'none' ); ?>
    <?php endif; ?>
    </main><!-- #main -->
  </div><!-- #primary -->
<?php get_footer(); ?>