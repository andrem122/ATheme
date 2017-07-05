<?php
//default template for post content
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(is_single()): ?>
  <header class="post-title-holder">
    <h1 class="header-title">
      <?php
        the_title();
      ?>
    </h1>
    <span class="underline"></span>
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
    <div class="post-title">
      <h2 class="entry-title">
        <p class="p-meta left">
          <span>
            <time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('d M'); ?></time>
          </span>
        </p>
        <?php if(is_single()):
                the_title();
              else: ?>
                <a href="<?php esc_url(the_permalink()); ?>" title="Permalink to: <?php the_title(); ?>">
                  <?php
                    the_title();
                  ?>
                </a>
        <?php endif; ?>
      </h2>
    </div>
    <?php
      //get the post information
      get_template_part('template-parts\post\content', 'post-info')
    ?>
    <div class="post-content">
      <?php
      //if it's a single page, display the whole text
        if(is_single()):
          the_content();
        //if it's not a single page, display an excerpt
      else: ?>
        <?php the_excerpt(); ?>
        <a class="button" href="<?php esc_url(the_permalink()); ?>">Read More</a>
      <?php
        endif; ?>
    </div><!-- .post-content -->
    <?php
      //display tags
      get_template_part('template-parts/post/content', 'tags')
    ?>
  </div><!-- .post-text -->
</article><!-- #post-## -->
