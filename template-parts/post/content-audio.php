<?php
//template part for audio posts
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(is_single()): ?>
  <header class="post-title-holder">
    <?php the_title('<h1 class="header-title">', '</h1><span class="underline"></span>'); ?>
  </header>
<?php endif; ?>
  <div class="post-image">
    <?php if(is_single()):
            if(has_post_thumbnail()):
              the_post_thumbnail();
            endif;
          else: ?>
            <a href="<?php esc_url(the_permalink()); ?>" title="Permalink to: <?php the_title(); ?>">
              <?php
                if(has_post_thumbnail()):
                  the_post_thumbnail();
                endif;
              ?>
            </a>
    <?php endif; ?>
  </div><!-- .post-image -->
  <?php if(is_single()): ?>
  <div class="audio-content">
    <?php the_content(); ?>
  </div><!-- .audio-content -->
  <?php endif; ?>
  <div class="post-text">
    <?php
      //get the title
      get_template_part('template-parts\post\content', 'title');
      //get the post information
      get_template_part('template-parts\post\content', 'post-info');
    ?>
    <?php if(!is_single()): ?>
    <div class="audio-content">
      <?php the_content(); ?>
      <a class="button" href="<?php esc_url(the_permalink()); ?>"><?php _e('Read More', 'atheme')  ?></a>
    </div><!-- .audio-content -->
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
