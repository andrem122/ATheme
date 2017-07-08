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
