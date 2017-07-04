<?php
//the main, default sidebar for every page

//if the main sidebar does not have widgets (is not in use),
//then do nothing (terminate the script). Otherwise, retrieve the sidebar
if(!is_active_sidebar('sidebar-main')) {
  return;
}
?>
<aside id="sidebar-main" class="widget-area col-md-4 right">
  <?php
  //pulls and adds all the widgets that have been added to the sidebar
  //through the admin screen to here
  dynamic_sidebar('sidebar-main');
  ?>
  <?php echo atheme_recent_posts(); ?>
</aside>
