<?php
//the main template file
get_header();
?>
<div class="wrap clear <?php (is_active_sidebar('sidebar-blog')) ? esc_attr_e('col-md-8', 'atheme') : esc_attr_e('', 'atheme'); ?>">
  <main id="main" class="site-main" role="main">
    <header class="title-holder">
      <h1 class="header-title"><?php esc_html_e(wp_title(''), 'atheme'); ?></h1>
      <span class="underline"></span>
    </header>
    <?php
      if(have_posts()):
        while(have_posts()): the_post();
          get_template_part('template-parts/post/content', get_post_format());
        endwhile;

        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'atheme'),
          'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'atheme')
        ));

      else:
        //if there are no posts, get the content-none.php page
        get_template_part('template-parts/post/content', 'none');
      endif;
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
if(is_active_sidebar('sidebar-blog')):
  get_sidebar('blog');
endif;
get_footer();
?>
