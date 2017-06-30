<?php
//default template for post content
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  Content.php
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
    <div class="post-info">
      <p class="p-meta">
        <span>
          Posted at <time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('H:i'); ?></time>
          in <?php
              $categories = get_the_category();
              $separator = ' ';
              $output = '';
              if (!empty( $categories ) ) {
                foreach($categories as $category) {
                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'atheme' ), $category->name ) ) . '">' . esc_html($category->name) . '</a>' . $separator;
                }
                echo trim($output, $separator);
              }
          ?>
        </span> by <span class="post-author"><?php the_author(); ?></span>
        <?php
        //if there is at least one comment, get the number of comments
        if(get_comments_number()): ?>
          <span> | <?php esc_html_e(get_comments_number()); ?> Comments</span>
        <?php endif; ?>
      </p>
    </div>
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
  </div><!-- .post-text -->
</article><!-- #post-## -->
