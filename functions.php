<?php
function a_theme_scripts() {
  //stylesheets
  wp_enqueue_style('a-theme', get_stylesheet_uri());
  //fonts
  wp_enqueue_style('g-font-libre-franklin', 'https://fonts.googleapis.com/css?family=Libre+Franklin:400,600');
  //scripts
  wp_enqueue_script('a-theme', get_template_directory_uri() . '/assets/js/a-theme.js', array('jquery'), 1.0, true);
  wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/995faad108.js');
  if(is_singular() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
//puts all stylesheets and scripts in my webpages
add_action('wp_enqueue_scripts', 'a_theme_scripts');

//theme supports
function a_theme_setup() {
  load_theme_textdomain('atheme');
  //theme supports
  add_theme_support('menus');
  //title tag
  add_theme_support('title-tag');
  //post thumbnails
  add_theme_support('post-thumbnails');
  //sets recent posts thumbnails
  add_image_size('atheme-recent-posts-thumbnail', 287, 187, true);
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
  //custom logo
  add_theme_support( 'custom-logo', array(
  	'height'      => 75,
  	'width'       => 150,
  	'flex-height' => true,
  	'flex-width'  => true,
  	'header-text' => array( 'site-title', 'site-description')
  ));
  add_theme_support('html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
    'search-form',
	));
  //custom background color
  add_theme_support( 'custom-background', array(
  	'default-color' => '#f6f6f6',
  ));
  //automatic feed links
  add_theme_support('automatic-feed-links');
  //menus
  register_nav_menus(array(
    'top' => 'Top Menu',
    'bottom' => 'Bottom Menu'
  ));
  //set the default content width.
	$GLOBALS['content_width'] = 1400;
}

//call function a_theme_setup after setup of the theme
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
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
  //footer 1 sidebar
  register_sidebar(
    array(
      'name'  => 'Footer 1',
      'id'    => 'sidebar-footer-1',
      'description' => __('Add widgets here to appear in the left of your footer', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
  //footer 2 sidebar
  register_sidebar(
    array(
      'name'  => 'Footer 2',
      'id'    => 'sidebar-footer-2',
      'description' => __('Add widgets here to appear in the middle of your footer', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
  //footer 3 sidebar
  register_sidebar(
    array(
      'name'  => 'Footer 3',
      'id'    => 'sidebar-footer-3',
      'description' => __('Add widgets here to appear in the right of your footer', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
  register_sidebar(
    array(
      'name'  => 'Social Media Links',
      'id'    => 'sidebar-footer-social',
      'description' => __('Add your social media links here', 'atheme'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    )
  );
}

add_action('widgets_init', 'a_theme_widget_init');

function atheme_content_width() {

  if (!isset($content_width)) {
    $content_width = $GLOBALS['content_width'];
  }

	$GLOBALS['content_width'] = apply_filters( 'atheme_content_width', $content_width );
}

add_action('template_redirect', 'atheme_content_width', 0);

//custom comment markup
function atheme_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  ?>
  <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <div class="comment">
      <div class="image">
        <?php
          echo get_avatar(get_comment_author_email(), 83);
        ?>
      </div>
      <div class="text">
        <h5 class="name"><?php printf(esc_html('%s', 'atheme'), get_comment_author($comment->comment_ID)); ?></h5>
        <span class="comment-date"><?php printf(esc_html(get_comment_date('m.d.Y \a\t h:i A', (int)'%s'), 'atheme'), (string)$comment->comment_ID); ?></span>
        <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        <div class="comment-content">
          <?php comment_text(); ?>
        </div>
      </div>
    </div>

<?php } ?>

<?php
  //alters the default comment form
  function atheme_comment_form($fields) {
    //author
    $fields['author'] = str_replace(
      '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text"',
        '<p class="comment-form-author col-sm-4"><label for="author">Name <span class="required">*</span></label> <input placeholder="'
            . _x('Your full name',
                'comment form author placeholder',
                'atheme'
                )
            . '"' . 'id="author" name="author" type="text"',
        $fields['author']
    );
    //email
    $fields['email'] = str_replace(
      '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email"',
        '<p class="comment-form-email col-sm-4"><label for="email">Email <span class="required">*</span></label> <input placeholder="'
            . _x('E-mail address',
                'comment form email placeholder',
                'atheme'
                )
            . '"' . 'id="email" name="email" type="email"',
        $fields['email']
    );
    //website
    $fields['url'] = str_replace(
      '<p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url"',
        '<p class="comment-form-url col-sm-4"><label for="url">Website</label> <input placeholder="'
            . _x('Website',
                'comment form website placeholder',
                'atheme'
                )
            . '"' . 'id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
  }

  add_filter('comment_form_default_fields', 'atheme_comment_form');

  function atheme_placeholder_comment_form_field($fields) {
    $replace_comment = _x('Write your comment here...', 'comment form textarea placeholder' ,'atheme');

    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'atheme') .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . $replace_comment . '" aria-required="true"></textarea></p>';

    return $fields;
 }
 add_filter( 'comment_form_defaults', 'atheme_placeholder_comment_form_field' );

 //custom markup for mobile nav menu
 class atheme_walker_mobile_nav_menu extends Walker_Nav_Menu {
     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';
        $classes = $item->classes;
        foreach ($classes as $class) {
          if($class === 'menu-item-has-children') {
            $output .= $indent . '<button class="mobile-submenu-button"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>';
          }
        }

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        if ( 'top' == $args->theme_location ) {
            $submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

//custom markup for nav menu
class atheme_walker_nav_menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
       global $wp_query;
       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

       $class_names = '';

       $classes = empty( $item->classes ) ? array() : (array) $item->classes;
       $classes[] = 'menu-item-' . $item->ID;

       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
       $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

       $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
       $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

       $output .= $indent . '<li' . $id . $class_names .'>';
       $classes = $item->classes;
       foreach ($classes as $class) {
         if($class === 'menu-item-has-children' && $depth > 0) {
           $output .= $indent . '<i class="fa fa-angle-left" aria-hidden="true"></i>';
         }
       }

       $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
       $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
       $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
       $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

       $item_output = $args->before;
       $item_output .= '<a'. $attributes .'>';
       $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

       if ( 'top' == $args->theme_location ) {
        $submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
       }
       $item_output .= '</a>';
       $item_output .= $args->after;

       if ($class === 'menu-item-has-children' && $depth === 0) {
         $item_output .= $indent . '<i class="fa fa-angle-double-down" aria-hidden="true"></i>';
       }

       $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   }
}
