<?php
function a_theme_scripts() {
  //stylesheets
  wp_enqueue_style('a-theme', get_stylesheet_uri());
  //fonts
  wp_enqueue_style('g-font-libre-franklin', 'https://fonts.googleapis.com/css?family=Libre+Franklin:400,600');
  //scripts
  wp_enqueue_script('a-theme', get_template_directory_uri() . '/assets/js/a-theme.js', array('jquery'), 1.0, true);
  wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/995faad108.js');
}
//puts all stylesheets and scripts in my webpages
add_action('wp_enqueue_scripts', 'a_theme_scripts');

//theme supports
function a_theme_setup() {
  //theme supports
  //menus
  add_theme_support('menus');
  //title tag
  add_theme_support( 'title-tag' );
  //post thumbnails
  add_theme_support( 'post-thumbnails' );
  //post formats
  add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio'
  ));
  //menus
  register_nav_menus(array(
    'top' => 'Top Menu',
    'bottom' => 'Bottom Menu'
  ));
}

//call function agangster_theme_setup() after initilization of the theme
add_action('after_setup_theme', 'a_theme_setup');

function a_theme_widget_init() {
  //standard sidebar for all pages
  register_sidebar(
    array(
      'name'  => 'Site Sidebar',
      'id'    => 'sidebar-main',
      'description' => __('Standard sidebar for all pages on your website.', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
  //blog sidebar
  register_sidebar(
    array(
      'name'  => 'Blog Sidebar',
      'id'    => 'sidebar-blog',
      'description' => __('Add widgets here to appear on your blog and archive pages.', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>'
    )
  );
}

add_action('widgets_init', 'a_theme_widget_init');
