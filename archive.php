<?php get_header(); ?>
  <div id="primary" class="content-area col-md-9">
    <h1>
      Listado de articulos de un archivo
    </h1>
    <main id="main" class="site-main" role="main">
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