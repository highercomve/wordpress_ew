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
    // register_nav_menus( array(
    //   'primary' => __( 'Primary Navigation', 'temeitor' )
    // ) );
  }
endif;