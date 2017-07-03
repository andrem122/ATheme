<?php if(is_single()): ?>
  <aside class="tags">
    <?php
      if(has_tag()):
        the_tags();
      endif;
    ?>
  </aside>
<?php endif; ?>
