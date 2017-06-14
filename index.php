<?php get_header(); ?>
<main id="main" class="site-main" role="main">
  <?php
    if(is_active_sidebar('sidebar-main')):
      echo '<div class="row">
              <div class="col-sm-8">';
    endif;
    if(have_posts()):
      while(have_posts()):
        the_post();
        get_template_part('templates/post/content', get_post_format());
      endwhile;
    else:
      //if there are no posts, get the content-none.php page
      get_template_part('templates/post/content', 'none');
    endif;
    if(is_active_sidebar('sidebar-main')):
      echo '</div>'; //close col-sm-8
      //get the default sidebar, 'sidebar.php'
      get_sidebar();
      echo '</div>'; // close row
    endif;
  ?>
</main>
<?php get_footer(); ?>
