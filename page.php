<?php
//template for displaying all pages
get_header();
?>
<div class="wrap clear <?php (is_active_sidebar('sidebar-main')) ? esc_attr_e('col-md-8', 'atheme') : esc_attr_e('', 'atheme'); ?>">
  <main id="main" class="site-main" role="main">
    <?php
        while(have_posts()): the_post();
          get_template_part('template-parts/page/content', 'page');
        endwhile; //loop ends
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
if(is_active_sidebar('sidebar-main')):
  get_sidebar('main');
endif;
get_footer();
?>
