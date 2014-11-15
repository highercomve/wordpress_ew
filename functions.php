<?php

add_action( 'after_setup_theme', 'temeitor_setup' );

if ( ! function_exists( 'temeitor_setup' ) ):
  function temeitor_setup() {
    add_editor_style();
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
    wp_enqueue_script('bootstrap');
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