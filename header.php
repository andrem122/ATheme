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
      <header class="top">
        <!-- logo -->
        <div class="logo left">
          <a href="<?php echo home_url(); ?>">
            <?php
              if(function_exists('the_custom_logo')):
                if(has_custom_logo()):
                  the_custom_logo();
                else:
                  echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
                endif;
              endif;
            ?>
          </a>
        </div>
        <!-- top menu -->
        <nav class="right"><?php wp_nav_menu(array('theme_location'=>'top')); ?></nav>
      </header>
      <div class="page">
        <?php
          if(!is_page_template('template-parts/content-full-width.php')):
            echo '<div class="center-content">';
          endif;
        ?>
          <?php
            if(is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')):
              echo '<div class="row">';
            endif;
          ?>
