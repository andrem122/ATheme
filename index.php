<?php
get_header();
?>
<div class="wrap clear <?php
$class = (is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')) ? 'col-md-8' : ''; echo $class; ?>">
  <main id="main" class="site-main" role="main">
    <?php
      if(have_posts()):
        while(have_posts()): the_post();
          get_template_part('template-parts/post/content', get_post_format());
        endwhile;
      else:
        //if there are no posts, get the content-none.php page
        get_template_part('templates/post/content', 'none');
      endif;
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
//get different sidebars for different pages
if(is_home() || is_page()):
  get_sidebar('main');
else:
  get_sidebar('blog');
endif;
get_footer();
?>
