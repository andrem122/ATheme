<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- all stylesheets, meta Tags, title etc. -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="body-container">
      <header>
        <!--top menu-->
        <nav><?php wp_nav_menu(array('theme_location'=>'top')); ?></nav>
      </header>
      <div class="page">
        <div class="center-content">
          <?php
          if(is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')):
            echo '<div class="row">';
          endif;
          ?>
