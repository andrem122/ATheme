<?php
//template for displaying tag posts
get_header();
?>
<div class="wrap clear <?php
$class = (is_active_sidebar('sidebar-blog')) ? 'col-md-8' : ''; esc_attr_e($class); ?>">
  <main id="main" class="site-main" role="main">
    <header class="category-header">
      <h1 class="header-title"><?php esc_html_e(single_tag_title('Tag: ')); ?></h1>
      <span class="underline"></span>
      <?php
      //display tag description
      if(tag_description()):
      ?>
      <div class="archive-meta">
        <?php echo tag_description(); ?>
      </div>
      <?php endif; ?>
    </header>
    <?php
      if(have_posts()):
        while(have_posts()): the_post();
          get_template_part('template-parts/post/content', get_post_format());
        endwhile;
      else:
        //if there are no posts, get the content-none.php page
        get_template_part('template-parts/post/content', 'none');
      endif;
    ?>
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
<?php
//get the blog sidebar
if(is_active_sidebar('sidebar-blog')):
  get_sidebar('blog');
endif;
get_footer();
?>
