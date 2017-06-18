<?php
//Template Name: Fullwidth | Header, Footer
get_header();
if(have_posts()):
  while(have_posts()):
    the_post();
    the_content();
  endwhile;
else:
  echo '<h2>There are no posts to display!</h2>';
endif;
get_footer();
?>
