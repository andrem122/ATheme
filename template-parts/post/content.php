<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="post-image">
      <a href="<?php esc_url(the_permalink()); ?>" title="Permalink to: <?php the_title(); ?>">
        <?php
          if(has_post_thumbnail()):
            the_post_thumbnail();
          endif;
        ?>
      </a>
    </div>
    <div class="post-title">
      <h1 class="entry-title">
        <a href="<?php esc_url(the_permalink()); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    </div>
    <p class="p-meta">
      <span>
        <time><?php the_time('F j, Y'); ?></time>
      </span>
    </p>
  </header><!-- .entry-header -->
  <div class="entry-content">
    <?php
    //if it's a single page, display the whole text
      if(is_single()):
        the_content();
      //if it's not a single page, display an excerpt
      else:
        the_excerpt();
      endif;
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
