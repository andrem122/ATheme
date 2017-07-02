<?php
//template part for displaying quote posts
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-title-holder">
    <h1 class="header-title">
      <?php
      if(is_single()):
        the_title();
      endif;
      ?>
    </h1>
    <span class="underline left"></span>
  </div>
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
    <div class="quote-wrap">
      <div class="post-info">
        <p class="p-meta">
          <span>
            Posted on <?php the_time('d M'); ?> at <time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('H:i'); ?></time>
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
          if(get_comments_number()):
            $comments_num = get_comments_number();
          ?>
            <span> | <?php $comment_message = ($comments_num > 1) ? ' Comments' : ' Comment'; echo esc_html($comments_num . $comment_message); ?></span>
          <?php endif; ?>
        </p>
      </div>
      <i class="fa fa-quote-left left" aria-hidden="true"></i>
      <div class="quote-content">
        <?php
        //if it's a single page, display the whole text
          if(is_single()):
            the_content();
          //if it's not a single page, display an excerpt
          else: ?>
            <a class="quote-link" href="<?php esc_url(the_permalink()); ?>"><?php the_excerpt(); ?></a>
        <?php
          endif;  ?>
      </div><!-- .quote-content -->
    </div><!-- .quote-wrap -->
    <?php if(is_single()): ?>
      <aside class="tags">
        <?php
          if(has_tag()):
            the_tags();
          endif;
        ?>
      </aside>
    <?php endif; ?>
  </div><!-- .post-text -->
</article><!-- #post-## -->
