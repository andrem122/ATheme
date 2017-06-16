<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class="p-meta">
      <span>
        <time><?php the_time('F j, Y'); ?></time>
      </span>
    </p>
  </header><!-- .entry-header -->
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
