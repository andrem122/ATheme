<?php //template part for posts that cannot be found ?>
<section class="no-results not-found">
  <header class="post-title-holder">
    <h1 class="header-title"><?php _e('No Posts Were Found', 'atheme'); ?></h1>
    <span class="underline left"></span>
  </header>
  <div class="page-content">
    <?php
      //if the current page is home and the user can publish posts
      if(is_home() && current_user_can('publish_posts')):
    ?>
      <p><?php printf( __( 'Publish your first post. <a href="%1$s">Get started here</a>.', 'atheme' ), esc_url(admin_url( 'post-new.php' ))); ?></p>
    <?php else: ?>
      <p><?php _e('Sorry, we can&rsquo;t find what you&rsquo;re looking for. Try a search.', 'atheme'); ?></p>
    <?php
    get_search_form();
    endif; ?>
  </div>
</section><!-- .no-results.not-found -->
