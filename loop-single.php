<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>
        <?php the_post_thumbnail('large'); ?>
      </figure>
      <h1>
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
          <?php the_title() ?>
        </a>
      </h1>
      <h6>
        <?php the_time(get_option( 'date_format' ) ); ?>
        <b><?php echo __(' escrito por: ','temeitor') ?></b>
        <?php the_author_posts_link() ?>
      </h6>
    </header><!-- .entry-header -->
    <div class="entry-content">
      <?php if (is_single()): ?>
        <?php the_content() ?>
      <?php else: ?>
        <?php the_excerpt() ?>
      <?php endif ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
      <p>
        <?php _e("<b>Categorias:</b> ", "temeitor") ?>
        <?php the_category(', ') ?>
      </p>
      <p> 
        <?php the_tags(__("<b>Etiquetas:</b> ", "temeitor"), ", ") ?>
      </p>
      <?php if (!is_page()): ?>
        <p class="text-center">
          <span class="author_image">
            <?php echo get_avatar(get_the_author_meta('user_email'), 180) ?>
          </span>
        </p>
        <p class="text-center">
          <span class="author_name">
            <?php the_author_posts_link() ?>
          </span>
        </p>
        <p class="text-center">
          <?php echo get_the_author_meta('description') ?>
        </p>
      <?php endif ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->
<?php endwhile; ?>
<?php 
  // pagination TODO
?>