<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="search-wrap">
    <label>
      <span class="screen-reader-text"><?php _e('Search for:', 'atheme') ?></span>
      <input type="search" class="search-field" placeholder="<?php echo esc_attr('Search'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
    </label>
  </div>
</form>
