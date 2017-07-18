<?php
   /*
   Plugin Name: Atheme Recent Posts
   Description: A plugin to display recent posts
   Version: 1.0
   Author: Andre Mashraghi
   Author URI: http://andremashraghi.com/
   License: GPL2
   */

//displays recent posts
//shortcode [recent-posts number_posts="3"]
function atheme_recent_posts($atts){
  $a = shortcode_atts( array(
        'number_posts' => '3',
        'horizontal'   => false
  ), $atts);
  $q = new WP_Query(
    array( 'orderby' => 'date', 'posts_per_page' => $a['number_posts'])
  );
  $grid_number = ceil(12 / (int)$a['number_posts']);
  $atheme_class = $a['horizontal'] ? array('row', 'col-md-' . $grid_number) : '';
  $list = '<ul class="atheme-recent-posts ' . $atheme_class[0] . '">';

  while($q->have_posts()) : $q->the_post();

   $list .=
   '<li class="' . $atheme_class[1] . '">' .
      '<article class="atheme-recent-post">';
      if(has_post_thumbnail()):
        $list .=
          '<div style="background-image: url(\'' . esc_url(get_the_post_thumbnail_url()) . '\');" class="atheme-recent-posts-top">' .
              '<a href="' . esc_url(get_permalink()) . '"></a>' .
          '</div>';
      else:
        $list .=
          '<div style="background-image: url(\'' . esc_url(get_template_directory_uri() . '/assets/images/post/atheme-logo.png') . '\');" class="atheme-recent-posts-top default-post-image">' .
              '<a href="' . esc_url(get_permalink()) . '"></a>' .
          '</div>';
      endif;
      $list .=
        '<div class="atheme-recent-posts-bottom">
          <div class="post-title">
            <h4>
              <a href="' . esc_url(get_permalink()) . '">' .
                esc_html(get_the_title(), 'atheme') .
              '</a>
            </h4>
          </div>
          <div class="post-info">
            <p class="p-meta">
              <span><time datetime="' . esc_attr(get_the_time('Y-m-d H:i')) . '">' . esc_html(get_the_time('F j, Y'), 'atheme') . '</time></span>
            </p>
          </div>
        </div>
      </article>
    </li>';
  endwhile;

  wp_reset_query();

  return $list . '</ul>';

}
add_shortcode('recent-posts', 'atheme_recent_posts');

$atheme_columns = null;
function atheme_pricing_table($atts, $content = null) {
  extract(shortcode_atts(array(
    'columns' => '3',
  ), $atts));
  global $atheme_columns;
  $atheme_columns = $columns;
  return '<div class="atheme-pricing-table ' . $columns . '-columns">' .
             do_shortcode($content) .
         '</div>';
}
add_shortcode('price-table', 'atheme_pricing_table');

function atheme_pricing_table_column($atts) {
  extract(shortcode_atts(array(
    'title'    => 'Title',
    'featured' => false,
    'price'    => 0,
    'interval' => 'Per Month',
    'item1'     => 'Item 1',
    'item2'     => 'Item 2',
    'item3'     => 'Item 3',
  ), $atts));
  global $atheme_columns;
  $grid_number = !is_null($atheme_columns) ? ceil(12 / (int)$atheme_columns) : '';
  $featured_class = $featured === true ? 'featured' : '';
  $price_column = '<div class="atheme-pricing-table col-md-' . $grid_number . ' ' . $featured_class . '">' .
            '<h2 class="atheme-pricing-table-title">' . $title . '</h2>' .
            '<div class="atheme-pricing-column-info">' .
              '<h3 class="atheme-price">' . $price . '</h3>' .
              '<span class="atheme-interval">' . $interval . '</span>' .
              '<ul class="atheme-price-list row">
                <li>' . $item1 . '</li>' .
               '<li>' . $item2 . '</li>' .
               '<li>' . $item3 . '</li>' .
              '</ul>' .
              '<a class="button-md">Join Now</a>' .
         '</div>';
  return $price_column;
}
add_shortcode('price-table-column', 'atheme_pricing_table_column');
