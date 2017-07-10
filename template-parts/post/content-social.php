<?php
//template for social media links
if(is_single()):
?>
<div class="social-sharing-icons">
  <h4 class=""><?php _e('Share This Post', 'atheme'); ?></h4>
  <div class="social-sharing-icons-wrap">
    <!-- facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&text=Check%20this%20post%20out:%0A%0A<?php the_title('%27', '%27%0A%0A'); the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">
      <i class="fa fa-facebook facebook" aria-hidden="true"></i>
    </a>
    <!-- google plus -->
    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>&text=Check%20this%20post%20out:%0A%0A<?php the_title('%27', '%27%0A%0A'); the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">
      <i class="fa fa-google-plus g-plus" aria-hidden="true"></i>
    </a>
    <!-- twitter -->
    <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=Check%20this%20post%20out:%0A%0A<?php the_title('%27', '%27%0A%0A'); ?>&title=<?php the_title(); ?>" target="_blank">
      <i class="fa fa-twitter twitter" aria-hidden="true"></i>
    </a>
    <!-- linkedin -->
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&text=Check%20this%20post%20out:%0A%0A<?php the_title('%27', '%27%0A%0A'); the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">
      <i class="fa fa-linkedin linkedin" aria-hidden="true"></i>
    </a>
  </div>
</div>
<?php endif; ?>
