<?php
//template part for standard post
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
  <div class="post-text">
    <?php
      //get the title
      get_template_part('template-parts\post\content', 'title');
      //get the post information
      get_template_part('template-parts\post\content', 'post-info');
    ?>
    <div class="post-content">
      <?php
      //if it's a single page, display the whole text
        if(is_single()):
          the_content();
        //if it's not a single page, display an excerpt
      else: ?>
        <?php the_excerpt(); ?>
        <a class="button-md" href="<?php esc_url(the_permalink()); ?>">Read More</a>
      <?php
        endif; ?>
    </div><!-- .post-content -->
    <?php
      //display tags
      get_template_part('template-parts/post/content', 'tags');
    ?>
  </div><!-- .post-text -->
  <?php
    //social sharing
    get_template_part('template-parts/post/content', 'social');
  ?>
</article><!-- #post-## -->
