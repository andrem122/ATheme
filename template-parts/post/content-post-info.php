<div class="post-info">
  <p class="p-meta">
    <span>
      Posted at <time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('H:i'); ?></time>
      in <?php
          $categories = get_the_category();
          $separator = ', ';
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
      //get the number of comments and display it
      $comments_num = get_comments_number();
    ?>
      <span> | <?php $comment_message = ($comments_num > 1 || $comments_num < 1) ? ' Comments' : ' Comment'; echo esc_html($comments_num . $comment_message); ?></span>
  </p>
</div>
