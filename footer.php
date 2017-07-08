      <?php
      //the footer
      //close the div with .row if sidebar-main is active
      if(is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')):
        echo '</div><!-- .row -->';
      endif;
      ?>
      <?php
      //close the div with .center-content if the full page template is
      //NOT used
      if(!is_page_template('template-parts/content-full-width.php')):
        echo '</div><!-- .center-content -->';
      endif;
      ?>
    </div><!-- .page -->
    <footer>
      <div class="wrap">
        <div class="center-content">
          <div class="row">
            <?php get_template_part('template-parts/footer/footer', 'widgets') ?>
            <!-- bottom menu -->
            <?php
              if(!is_active_sidebar('sidebar-footer-1') ||
              !is_active_sidebar('sidebar-footer-2') ||
              !is_active_sidebar('sidebar-footer-3')):
            ?>
            <nav>
              <?php
                if(has_nav_menu('bottom')):
                  wp_nav_menu(array(
                    'theme_location' => 'bottom',
                    'container'      =>  false,
                    'container_class' => 'center-text',
                    'menu' => __( 'The Bottom Menu', 'atheme' ),
                  ));
                endif;
              ?>
              <div class="social-media-links center-text">
                <?php
                  if(is_active_sidebar('sidebar-footer-social')):
                    dynamic_sidebar('sidebar-footer-social');
                  endif;
                ?>
              </div>
            </nav>
            <?php
              get_template_part('template-parts/footer/site', 'info');
              endif; //end is_active_sidebar() check
            ?>
          </div>
        </div>
      </div>
    </footer>
    <!--Scripts-->
    <?php wp_footer(); ?>
  </body>
</html>
