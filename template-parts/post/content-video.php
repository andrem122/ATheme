<?php
//template part for video posts
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(is_single()): ?>
    <header class="post-title-holder">
      <?php the_title('<h1 class="header-title">', '</h1><span class="underline"></span>'); ?>
    </header>
  <?php endif; // end is_single() check ?>
    <div class="video-content">
      <?php the_content(); ?>
    </div><!-- .video-content -->
  <div class="post-text">
    <?php
      //get the title
      get_template_part('template-parts\post\content', 'title');
      //get the post information
      get_template_part('template-parts\post\content', 'post-info');
    ?>
    <?php if(!is_single()): ?>
      <a class="button" href="<?php esc_url(the_permalink()); ?>"><?php _e('Read More', 'atheme')  ?></a>
    <?php endif; ?>
    <?php
      //display tags
      get_template_part('template-parts/post/content', 'tags')
    ?>
  </div><!-- .post-text -->
  <?php
    //social sharing
    get_template_part('template-parts/post/content', 'social');
  ?>
</article><!-- #post-## -->
