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
	));
  //custom background color
  add_theme_support( 'custom-background', array(
  	'default-color' => '#f6f6f6',
  ));
  //menus
  register_nav_menus(array(
    'top' => 'Top Menu',
    'bottom' => 'Bottom Menu'
  ));
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

?>


<?php
//displays 3 recent posts with featured images

function atheme_recent_posts() {
  $atheme_recent_posts = new WP_Query();
  $atheme_recent_posts->query('showposts=3');
  if($atheme_recent_posts->have_posts()): ?>
    <section class="widget widget-recent-posts">
      <ul class="atheme-recent-posts">
        <?php while($atheme_recent_posts->have_posts()): $atheme_recent_posts->the_post(); ?>
          <li>
            <article class="atheme-recent-post">
              <div class="atheme-recent-posts-top">
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php
                    if(has_post_thumbnail()):
                      the_post_thumbnail();
                    endif;
                  ?>
                </a>
              </div>
              <div class="atheme-recent-posts-bottom">
                <div class="post-title">
                  <h4>
                    <a href="<?php esc_url(the_permalink()); ?>">
                      <?php esc_html(the_title()); ?>
                    </a>
                  </h4>
                </div>
                <div class="post-info">
                  <p class="p-meta">
                    <span><time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('F j, Y'); ?></time></span>
                  </p>
                </div>
              </div>
            </article>
          </li>
        <?php endwhile;
        wp_reset_postdata();
        ?>
      </ul>
    </section>
<?php
  endif;
}
?>

<?php
//custom comment markup
function atheme_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  $comment_id = $comment->comment_ID;
  $user_id = get_the_author_meta('ID', true);
  ?>
  <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <div class="comment">
      <div class="image">
        <?php echo get_avatar(get_the_author_meta('ID'), 83); ?>
      </div>
      <div class="text">
        <h5 class="name"><?php esc_html_e(get_comment_author($comment_id)); ?></h5>
        <span class="comment-date"><?php esc_html_e(get_comment_date('m.d.Y \a\t h:i A', $comment_id)); ?></span>
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
      '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="John Dillinger"',
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
      '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="genuwine12@gmail.com"',
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
      '<p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="http://www.bob.com"',
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

    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . $replace_comment . '" aria-required="true"></textarea></p>';

    return $fields;
 }
 add_filter( 'comment_form_defaults', 'atheme_placeholder_comment_form_field' );
