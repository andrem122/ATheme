          <?php
          //close the div with class row if sidebar-main is active
          if(is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-blog')):
            echo '</div>';
          endif;
          ?>
      </div><!-- .center-content -->
    </div><!-- .page -->
    <footer>
      <div class="content-center">
        <div class="row">
          <!-- bottom menu -->
          <nav>
            <?php wp_nav_menu(array('theme_location'=>'bottom')); ?>
          </nav>
          <?php get_template_part('template-parts/footer/site', 'info'); ?>
        </div>
      </div>
    </footer>
    <!--Scripts-->
    <?php wp_footer(); ?>
  </body>
</html>
