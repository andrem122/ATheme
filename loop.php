<section class="widget widget-recent-posts">
  <ul class="atheme-recent-posts">
      <li>
        <article class="atheme-recent-post">
          <?php if(has_post_thumbnail()): ?>
          <div style="background-image: url('<?php esc_url(the_post_thumbnail_url()); ?>');" class="atheme-recent-posts-top">
            <a href="<?php esc_url(the_permalink()); ?>"></a>
          </div>
          <?php endif; ?>
          <div class="atheme-recent-posts-bottom">
            <div class="post-title">
              <h4>
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php esc_html(the_title()); ?>
                </a>
              </h4>
            </div>
            <div class="post-info">
              <p class="p-meta">
                <span><time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('F j, Y'); ?></time></span>
              </p>
            </div>
          </div>
        </article>
      </li>
  </ul>
</section>
