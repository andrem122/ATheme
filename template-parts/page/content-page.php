<?php
//template part for displaying page content in page.php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-title-holder">
      <?php
        //if title is hidden, the margin won't affect the page layout
        //if you put the <h1> tags as arguments into the_title()
        the_title('<h1 class="header-title">', '</h1><span class="underline"></span>');
      ?>
  </header>
  <div class="page-content">
    <?php the_content(); ?>
  </div>
</article>
