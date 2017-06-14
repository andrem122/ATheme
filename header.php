<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!--All Stylesheets, Meta Tags, Title Etc.-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="body-container">
      <header>
        <!--Primary Menu-->
        <nav><?php wp_nav_menu(array('theme_location'=>'top')); ?></nav>
      </header>
      <div class="page-content">
        <div class="center-content">
