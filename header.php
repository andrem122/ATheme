<?php //the header ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- all stylesheets, meta Tags, title etc. -->
    <?php wp_head(); ?>
  </head>
  <?php $front_page_class = (is_front_page()) ? 'front-page' : ''; ?>
  <body <?php body_class($front_page_class); ?>>
    <div class="body-container">
      <header class="top">
        <div class="center-content">
          <!-- logo -->
          <div class="header-inner-left left">
            <div class="logo">
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
          </div>
          <div class="header-inner-right right">
            <!-- top menu -->
            <nav class="main-menu">
              <?php
                if(has_nav_menu('top')):
                  wp_nav_menu(array(
                    'theme_location' => 'top',
                    'container'      => false,
                    'menu' => __( 'The Top Menu', 'atheme' ),
                    'walker' => new atheme_walker_nav_menu()
                  ));
                endif;
              ?>
            </nav>
            <!-- mobile menu button -->
            <?php if(has_nav_menu('top')): ?>
              <button class="mobile-menu-button" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?php endif; ?>
          </div>
        </div>
        <!-- mobile menu -->
        <nav style="display: none" class="mobile-menu">
          <div class="center-content">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'top',
                'container'      => false,
                'menu' => __( 'The Top Menu', 'atheme' ),
                'walker' => new atheme_walker_mobile_nav_menu(),
              ));
            ?>
          </div>
        </nav>
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
