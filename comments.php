<?php
  //template for displaying comments
  /*
   * If the current post is protected by a password and the visitor has not yet
   * entered the password, we will return, kill the script, and not load the comments
   */
  if(post_password_required()):
    return;
  endif;
?>

<div id="comments" class="comments-area">
  <?php //check if we have comments. If we do output this html/code
  if(have_comments()): ?>
  <h2 class="comments-title">
    <?php
      $comments_number = get_comments_number();
      //if there is only one comment on the post, output this
      if('1' === $comments_number) {
        /* translators: %s: post title */
        printf(_x( '%s Comment', 'comments title', 'atheme' ), number_format_i18n($comments_number));
      } else {
        printf(
          /* translators: 1: number of comments, 2: post title */
          _x(
            '%s Comments',
            'comments title',
            'atheme'
          ),
          number_format_i18n($comments_number)
        );
      }
    ?>
  </h2>
  <!-- comments -->
  <ol class="comment-list">
    <?php
      wp_list_comments(array(
        'avatar_size' => 100,
        'style'       => 'ol',
        'reply_text'  => __('Reply', 'atheme'),
        'short_ping'  => true,
        'per_page'    => 25,
        'callback'    => 'atheme_comments',
      ));
    ?>
  </ol>
  <?php
  //pagination for comments if you have a lot
  the_comments_pagination(array(
    'prev_text' => '<span class="screen-reader-text">' . __('Previous', 'atheme') . '</span>',
    'next_text' => '<span class="screen-reader-text">' . __('Next', 'atheme') . '</span>'
  ));

  endif; // Check for have_comments()
  //if comments aren't open, there is at least 1 comment, and the current post you
  //are on supports the comment feature, display a message
  if(comments_open() && !have_comments() && post_type_supports(get_post_type(), 'comments')): ?>
    <h3 class="no-comments"><?php _e('No Comments', 'atheme'); ?></h3>
  <?php endif;
  //form for replying to posts
  comment_form(array(
    'title_reply' => 'Post A Comment'
  ));
  ?>
</div><!-- #comments -->
