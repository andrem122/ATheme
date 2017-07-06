<?php
//template part for video posts
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(is_single()): ?>
    <header class="post-title-holder">
      <?php the_title('<h1 class="header-title">', '</h1>'); ?>
      <span class="underline"></span>
    </header>
    <div class="video-content">
      <?php the_content(); ?>
    </div><!-- .video-content -->
  <?php else: ?>
    <div class="video-content">
      <?php the_content(); ?>
    </div><!-- .video-content -->
  <?php endif; // end is_single() check ?>
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
    <?php if(!is_single()): ?>
      <a class="button" href="<?php esc_url(the_permalink()); ?>"><?php _e('Read More', 'atheme')  ?></a>
    <?php endif; ?>
    <?php
      //display tags
      get_template_part('template-parts/post/content', 'tags')
    ?>
  </div><!-- .post-text -->
</article><!-- #post-## -->
