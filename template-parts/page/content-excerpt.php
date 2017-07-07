<?php
//template for excerpts of posts
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-image">
    <a href="<?php esc_url(the_permalink()); ?>" title="Permalink to: <?php the_title(); ?>">
      <?php
        if(has_post_thumbnail()):
          the_post_thumbnail();
        endif;
      ?>
    </a>
  </div><!-- .post-image -->
  <div class="post-text">
    <div class="post-title">
      <h2 class="entry-title">
        <p class="p-meta left">
          <span>
            <time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('d M'); ?></time>
          </span>
        </p>
        <a href="<?php esc_url(the_permalink()); ?>" title="Permalink to: <?php the_title(); ?>">
          <?php
            the_title();
          ?>
        </a>
      </h2>
    </div>
    <?php
      get_template_part('template-parts\post\content', 'post-info');
      the_excerpt();
    ?>
    <a class="button" href="<?php esc_url(the_permalink()); ?>">Read More</a>
  </div><!-- .post-text -->
</article><!-- #post-## -->
