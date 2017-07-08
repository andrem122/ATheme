<?php
//template for displaying search results
get_header();
?>
<div class="wrap clear <?php
$class = (is_active_sidebar('sidebar-main')) ? 'col-md-8' : ''; esc_attr_e($class); ?>">
  <main id="main" class="site-main" role="main">
    <header class="title-holder <?php $title_class = (have_posts()) ? '' : 'title-center'; esc_attr_e($title_class); ?>">
      <?php if(have_posts()): ?>
        <h1 class="header-title"><?php printf(__('Search Results For %s', 'atheme'), '<span>' . get_search_query() . '</span>'); ?></h1>
      <?php else: ?>
        <h1 class="header-title"><?php _e('Nothing Found', 'atheme'); ?></h1>
      <?php endif; ?>
      <span class="underline"></span>
    </header>
    <?php
      if(have_posts()):
        while(have_posts()): the_post();
          //if it is a post, get the post format template, else get the excerpt
          //template for pages
          if($post->post_type === 'post'):
            get_template_part('template-parts/post/content', get_post_format());
          else:
            get_template_part('template-parts/page/content', 'excerpt');
          endif;
        endwhile;

        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'atheme'),
          'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'atheme')
        ));

      else:
      //if there are no results, display a message and the search form
    ?>
      <p class="center-text"><?php _e('Sorry, nothing matched your search terms. Please try again with different keywords.', 'atheme') ?></p>
    <?php
      get_search_form();
      endif;
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
if(is_active_sidebar('sidebar-main')):
  get_sidebar('main');
endif;
get_footer();
?>
