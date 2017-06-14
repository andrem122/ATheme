    </div><!--center content-->
  </div><!--page content-->
  <footer>
    <div class="content-center">
      <div class="row">
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
