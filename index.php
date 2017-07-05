<?php
get_header();
?>
<div class="wrap clear <?php
$class = (is_active_sidebar('sidebar-blog')) ? 'col-md-8' : ''; esc_attr_e($class); ?>">
  <main id="main" class="site-main" role="main">
    <header class="title-holder">
      <h1 class="header-title"><?php wp_title(''); ?></h1>
      <span class="underline left"></span>
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
