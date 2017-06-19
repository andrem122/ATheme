      <?php
      //close the div with .row if sidebar-main is active
      if(is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')):
        echo '</div>';
      endif;
      ?>
      <?php
      //close the div with .center-content if the full page template is
      //NOT used
      if(!is_page_template('template-parts/content-full-width.php')):
        echo '</div>'; //.center-content
      endif;
      ?>
    </div><!-- .page -->
    <footer>
      <div class="wrap">
        <div class="center-content">
          <div class="row">
            <!-- bottom menu -->
            <nav>
              <?php
              wp_nav_menu(array(
                'theme_location' => 'bottom',
                'container'      =>  false,
                'menu' => __( 'The Bottom Menu', 'atheme' ),  
              ));
              ?>
            </nav>
            <?php get_template_part('template-parts/footer/site', 'info'); ?>
          </div>
        </div>
      </div>
    </footer>
    <!--Scripts-->
    <?php wp_footer(); ?>
  </body>
</html>
