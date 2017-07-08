<?php
//displays the footer widgets if assigned
?>

<?php
if(is_active_sidebar('sidebar-footer-1') ||
is_active_sidebar('sidebar-footer-2') ||
is_active_sidebar('sidebar-footer-3')):
?>
<aside class="widget-area" role="complementary">
  <?php if(is_active_sidebar('sidebar-footer-1') || is_active_sidebar('sidebar-footer-social')): ?>
    <div class="widget-column col-md-4 footer-widget-1">
      <?php
        dynamic_sidebar('sidebar-footer-1');
        dynamic_sidebar('sidebar-footer-social');
      ?>
    </div>
  <?php endif; ?>
  <?php if(is_active_sidebar('sidebar-footer-2')): ?>
    <div class="widget-column col-md-4 footer-widget-2">
      <?php dynamic_sidebar('sidebar-footer-2'); ?>
    </div>
  <?php endif; ?>
  <?php if(is_active_sidebar('sidebar-footer-3')): ?>
    <div class="widget-column col-md-4 footer-widget-3">
      <?php dynamic_sidebar('sidebar-footer-3'); ?>
    </div>
  <?php endif; ?>
</aside><!-- .widget-area -->
<?php endif; ?>
