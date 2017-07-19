<?php
//template for displaying 404 pages (not found)
get_header();
?>

<div class="wrap">
  <main id="main" class="site-main" role="main">
    <section class="error-404 not-found">
      <header class="title-holder aligncenter">
        <h1 class="header-title"><?php _e('404 - Page not found', 'atheme'); ?></h1>
        <span class="underline"></span>
      </header>
      <div class="page-content">
        <p><?php _e('The page you are looking for never existed or is no longer here. Try a search instead, or go back to the home page and try to find what you&rsquo;re looking for.', 'atheme'); ?></p>
        <?php get_search_form(); ?>
      </div><!-- .page-content -->
    </section><!-- .error-404.not-found -->
  </main><!-- #main -->
</div><!-- .wrap -->
<?php
get_footer();
?>
