<?php /* Start the Loop */ ?>

<?php 
  // global $query_string;
  // query_posts($query_string."cat=-3&tag=asdasdasd"); 
  // query_posts("cat=3");
  // global $wp_query;
  // $mis_opciones = array(
  //   'post_type' => 'productos',
  //   'tax_query' => array(
  //     array(
  //       'taxonomy' => 'products-category',
  //       'field'    => 'slug',
  //       'terms'    => array( 'mi-caterogia' ),
  //     ),
  //   ),
  // );
  // // print_r($wp_query->query_vars); 
  // $args = array_merge( $wp_query->query_vars, $mis_opciones);
  // query_posts($args); 
?>




<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('col-md-6', 'otra-clase')); ?>>
    <header class="entry-header">
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
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->
<?php endwhile; ?>
<?php 
  // pagination TODO
?>
