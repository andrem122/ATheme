<?php
//the main, default sidebar for every page

//if the blog sidebar does not have widgets (is not in use),
//then do nothing (terminate the script). Otherwise, retrieve the sidebar
if(!is_active_sidebar('sidebar-blog')) {
  return;
}
?>
<aside id="sidebar-blog" class="widget-area col-md-4 right">
  <?php
  //pulls and adds all the widgets that have been added to the sidebar
  //through the admin screen to here
  dynamic_sidebar('sidebar-blog');
  ?>
  <?php echo atheme_recent_posts(); ?>
</aside>
