<?php
//the main, default sidebar for every page

//if the main sidebar does not have widgets (is not in use),
//then do nothing (terminate the script). Otherwise retrieve the sidebar
if(!is_active_sidebar('sidebar-main')) {
  return;
}
?>
<aside id="sidebar-main" class="widget-area col-sm-4">
  <?php dynamic_sidebar('sidebar-main'); ?>
</aside>
