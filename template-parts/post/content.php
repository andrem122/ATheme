<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
  </div>
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
    //if it's a single page, display the whole text
      if(is_single()):
        the_content();
      //if it's not a single page, display an excerpt
      else:
        the_excerpt();
      endif;
    ?>
  </div>
</article><!-- #post-## -->
