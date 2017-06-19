<?php
//template for viewing single posts
get_header();
?>

<div class="wrap clear <?php
$class = (is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')) ? 'col-md-8' : ''; echo $class; ?>">
  <main id="main" class="site-main" role="main">
    <?php
    //dont need if(have_posts()) because if we are on this page,
    //we have at least one post, which we are viewing
    while(have_posts()): the_post();
      get_template_part('template-parts/post/content', get_post_format());
      // If comments are open or we have at least one comment, load up the comment template.
      if(comments_open() || get_comments_number()):
        comments_template();
      endif;
    endwhile;
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
if(is_home() || is_page()):
  get_sidebar('main');
else:
  get_sidebar('blog');
endif;
get_footer();
?>
