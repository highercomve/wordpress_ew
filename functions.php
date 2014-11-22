  <?php

add_action( 'after_setup_theme', 'temeitor_setup' );

if ( ! function_exists( 'temeitor_setup' ) ):
  function temeitor_setup() {
    add_editor_style();
    add_theme_support('html5');
    add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
    add_theme_support( 'post-thumbnails' );
    // add_image_size('nombre',640,250,true);
    // add_theme_support( 'automatic-feed-links' );
    // load_theme_textdomain( 'temeitor', get_template_directory() . '/languages' );
    // $locale = get_locale();
    // $locale_file = get_template_directory() . "/languages/$locale.php";
    //if ( is_readable( $locale_file ) )
    //  require_once( $locale_file );
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'principal' => __( 'Navegacion princiapal', 'temeitor' )
    ) );
  }
endif;

// Para archivos javascript
add_action('wp_enqueue_scripts', 'add_temeitor_scripts');

if(! function_exists(add_temeitor_scripts)):
  function add_temeitor_scripts() {
    /* Add SCRIPTS */
    wp_register_script(
      'bootstrap',
      get_template_directory_uri().'/js/bootstrap.min.js',
      array('jquery-core'),
      '3.3.1',
      true
    );
    wp_register_script(
      'masonry-mio',
      get_template_directory_uri().'/js/masonry.pkgd.min.js',
      array('bootstrap'),
      '3.1.5',
      true
    );
    wp_register_script(
      'imageload',
      get_template_directory_uri().'/js/imagesloaded.pkgd.min.js',
      array('masonry-mio'),
      '3.1.8',
      true
    );
    wp_register_script(
      'temeitor',
      get_template_directory_uri().'/js/temeitor.js',
      array('imageload'),
      '1.0.0',
      true
    );

    wp_enqueue_script('temeitor');

    /* Finish Add SCRIPTS */
    /* Add Styles */
    wp_register_style(
      'bootstrap-style',
      get_template_directory_uri().'/css/bootstrap.min.css'
    );
    wp_register_style(
      'temeitor',
      get_stylesheet_uri(),
      array('bootstrap-style')
    );
    wp_enqueue_style('temeitor');
    /* Finish Add Styles */
  }
endif;

add_action('widgets_init', 'registrar_widgets');

if(! function_exists(registrar_widgets)):

  function registrar_widgets(){
    register_sidebar( array(
        'name' => __( 'Main 1 Sidebar', 'temeitor' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'temeitor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Main 2 Sidebar', 'temeitor' ),
        'id' => 'sidebar-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'temeitor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Main 3 Sidebar', 'temeitor' ),
        'id' => 'sidebar-3',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'temeitor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Main 4 Sidebar', 'temeitor' ),
        'id' => 'sidebar-4',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'temeitor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
  }

endif;

add_action( 'init', 'new_taxonomies' );

function new_taxonomies() {
  // create a new taxonomy
  register_taxonomy(
    'page- ', // Nombre que usara el sistema
    'page',
    array(
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'label' => __( 'Paises' ), // Nombre que va a ver el usuario
      'rewrite' => array( 'slug' => 'page-pais' ) //Nombre que tendra en la ruta
    )
  );
  register_taxonomy(
    'post-pais', // Nombre que usara el sistema
    'post',
    array(
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'label' => __( 'Paises' ), // Nombre que va a ver el usuario
      'rewrite' => array( 'slug' => 'post-pais' ) //Nombre que tendra en la ruta
    )
  );
  register_taxonomy(
    'products-category', // Nombre que usara el sistema
    'productos',
    array(
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'label' => __( 'Categorias' ), // Nombre que va a ver el usuario
      'rewrite' => array( 'slug' => 'products-category' ) //Nombre que tendra en la ruta
    )
  );
}

add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'productos',
    array(
      'labels' => array(
        'name' => __( 'Productos' ),
        'singular_name' => __( 'Producto' )
      ),
    'menu_position' => 5, 
    'query_var' => true,
    'rewrite' => array('slug' => 'productos'),
    'public' => true,
    'publicly_queryable' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-cart',
    'supports' => array(
        'editor',
        'title',
        'author',
        'thumbnail',
        'excerpt',
        'custom-fields'
      )
    )
  );
}

add_action('add_meta_boxes', 'agregar_mis_custom_fields');

if(! function_exists(agregar_mis_custom_fields)) {

  function agregar_mis_custom_fields() {
    add_meta_box(
      'product-price',
      __('Precio del producto'),
      'add_products_price_from',
      'productos',
      'side',
      'default'
    );
  }

}

function add_products_price_from($post) {

  $precio = get_post_meta($post->ID, 'product-price', true);

  echo '<div class="product-price-form">';
  echo '<label for="product-price">Precio del producto</label><br>';
  echo '<input type="date" value="';
  echo $precio;
  echo '" id="product-price" name="product-price">';
  echo '</div>';
}

add_action('save_post', 'save_products_price');

function save_products_price($post_id) {
  $mydata = sanitize_text_field( $_POST['product-price'] );
  update_post_meta( $post_id, 'product-price', $mydata );
}
