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
get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <h1>
              <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                <?php the_title() ?>
              </a>
            </h1>
            <figure>
              <?php the_post_thumbnail('large'); ?>
            </figure>
            <h6>
              <?php _e('Dia', 'temeitor') ?>: <?php the_date(); ?>
              <br>
              <?php _e('Hora', 'temeitor') ?>: <?php the_time(); ?>
            </h6>
          </header><!-- .entry-header -->
          <div class="entry-content">
            <?php the_excerpt() ?>
            <p>
              autor: <?php the_author_link() ?>
              <?php the_author_meta('aim') ?>
              <?php echo get_avatar(get_the_author_meta('user_email')) ?>
            </p>
            <?php the_category(', ') ?>
            <?php the_tags('antes ', 'separador', 'despues') ?>
          </div><!-- .entry-content -->
          <footer class="entry-footer">
          </footer><!-- .entry-footer -->
        </article><!-- #post-## -->
      <?php endwhile; ?>
      <?php 
        // pagination TODO
      ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
    </main><!-- #main -->
  </div><!-- #primary -->
  
<?php get_footer(); ?>