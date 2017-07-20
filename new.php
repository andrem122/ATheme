<?php
   /*
   Plugin Name: Atheme Shortcodes
   Description: A plugin for Atheme shortcodes
   Version: 1.0
   Author: Andre Mashraghi
   Author URI: http://andremashraghi.com/
   License: GPL2
   */

function atheme_shortcodes_init() {
  add_shortcode('recent-posts', 'atheme_recent_posts');
  add_shortcode('price-table-column', 'atheme_pricing_table_column');
  add_shortcode('icon-list', 'atheme_icon_list');
  add_shortcode('icon-list-item', 'atheme_icon_list_item');
  add_shortcode('button', 'atheme_button');
  add_shortcode('title', 'atheme_title');
  add_shortcode('blockquote', 'atheme_blockquote');
}

add_action('init', 'atheme_shortcodes_init');

//displays recent posts
//shortcode [recent-posts number_posts="3"]
function atheme_recent_posts($atts){
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts( array(
        'number_posts' => '3',
        'horizontal'   => false
  ), $atts));
  $q = new WP_Query(
    array( 'orderby' => 'date', 'posts_per_page' => $a['number_posts'])
  );
  $grid_number = ceil(12 / (int)$number_posts);
  $atheme_class = ($horizontal === 'true') ? array('row', 'col-md-' . $grid_number) : '';
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

$atheme_columns = null;
function atheme_pricing_table($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'columns' => '3',
  ), $atts));
  global $atheme_columns;
  $atheme_columns = $columns;
  return '<div class="atheme-pricing-table row ' . esc_attr($columns) . '-columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('price-table', 'atheme_pricing_table');

function atheme_pricing_table_column($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'title'    => 'Title',
    'featured' => false,
    'price'    => 0,
    'interval' => 'Per Month',
  ), $atts));
  global $atheme_columns;
  $grid_number = !is_null($atheme_columns) ? ceil(12 / (int)$atheme_columns) : '';
  $featured_class = ($featured === 'true') ? 'featured' : '';
  $price_column =
          '<div class="col-lg-' . esc_attr($grid_number) . '">' .
            '<div class="atheme-pricing-table-column ' . esc_attr($featured_class) . '">' .
              '<h2 class="atheme-pricing-table-title">' . esc_html($title);
              if($featured === 'true') {
                $price_column .= '<span class="atheme-featured-sub">Featured</span>';
              }
              $price_column .=
              '</h2>' .
              '<div class="atheme-pricing-column-info">' .
                '<h3 class="atheme-price">$' . esc_html($price) . '</h3>' .
                '<span class="atheme-interval">' . esc_html($interval) . '</span>' .
                do_shortcode($content) .
              '</div>
            </div>
          </div>';
  return $price_column;
}

function atheme_icon_list($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'type'    => 'ul',
    'class'   => '',
    'style'   => '',
  ), $atts));

  $class_attr = (!empty($class)) ? ' ' . esc_attr($class) . '"' : '"';
  $style_attr = (!empty($style)) ? ' style="' . esc_attr($style) . '"' : '';

  if($type === 'ol') {
    $list = '<ol class="atheme-icon-list' . $class_attr . $style_attr . '>' . do_shortcode($content) . '</ol>';
  } else {
    $list = '<ul class="atheme-icon-list' . $class_attr . $style_attr . '>' . do_shortcode($content) . '</ul>';
  }

  return $list;

}

function atheme_icon_list_item($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'type'    => 'check',
    'class'   => '',
    'style'   => '',
  ), $atts));

  $class_attr = (!empty($class)) ? ' ' . esc_attr($class) . '"' : '"';
  $style_attr = (!empty($style)) ? ' style="' . esc_attr($style) . '"' : '';

  $list_item =  '<li class="atheme-icon-list-item' . $class_attr . $style_attr . '>';
  $list_item .=   '<i class="fa fa-' . esc_attr($type) . '" aria-hidden="true"></i>' . esc_html($content);
  $list_item .= '</li>';

  return $list_item;
}

//buttons
function atheme_button($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'href'    => '#',
    'class'   => '',
    'style'   => '',
    'target'  => '',
    'size'    => 'medium',
  ), $atts));

  $class_attr = (!empty($class)) ? ' ' . esc_attr($class) . '"' : '"';
  $style_attr = (!empty($style)) ? ' style="' . esc_attr($style) . '"' : '';

  switch ($size) {
    case 'small':
        $size = 'sm';
        break;
    case 'medium':
        $size = 'md';
        break;
    case 'large':
        $size = 'lg';
        break;
    default:
        $size = 'md';
  }

  if(in_array($target, array('_blank', '_self', '_parent', '_top' ))) {
    $link_target = '" target="' . esc_attr($target);
  } else {
    $link_target = '';
  }

  $button =
  '<a href="' . esc_url($href) . $link_target . '" class="button-' . esc_attr($size) . $class_attr . $style_attr . '>';
  $button .= esc_html($content) . '</a>';
  return $button;
}

//titles
function atheme_title($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'position'    => 'left',
    'class'   => '',
    'style'   => '',
  ), $atts));

  //set class and style attributes
  $class_attr = (!empty($class)) ? ' ' . esc_attr($class) . '"' : '"';
  $style_attr = (!empty($style)) ? ' style="' . esc_attr($style) . '"' : '';

  switch ($position) {
    case 'left':
        $position_class = 'alignleft';
        break;
    case 'center':
        $position_class = 'aligncenter';
        break;
    case 'right':
        $position_class = 'alignright';
        break;
    default:
        $position_class = 'alignleft';
  }

  $title = '<header class="title-holder ' . esc_attr($position_class) . '">';
    $title .= '<h1 class="header-title' . $class_attr . $style_attr . '>' . esc_html($content) . '</h1>';
    $title .= '<span class="underline' . $class_attr . $style_attr . '></span>';
    $title .= '</header>';

  return $title;

}

//blockquotes
function atheme_blockquote($atts, $content = null) {
  // normalize attribute keys, lowercase
  $atts = array_change_key_case( (array)$atts, CASE_LOWER );

  extract(shortcode_atts(array(
    'cite'       => '',
    'type'       => 'center',
    'class'      => '',
    'style'      => '',
    'image_src'  => '',
    'alt'        => 'blockquote-image',
  ), $atts));

  switch ($type) {
    case 'left':
        $type_class = 'alignleft';
        break;
    case 'center':
        $type_class = 'aligncenter';
        break;
    case 'right':
        $type_class = 'alignright';
        break;
    default:
        $type_class = 'alignleft';
  }

  $type_class_attr = ' ' . esc_attr($type_class) . '"';
  $class_attr      = (!empty($class)) ? ' ' . esc_attr($class) : '';
  $style_attr      = (!empty($style)) ? ' style="' . esc_attr($style) . '"' : '';
  $image_center    = (!empty($image_src)) ? ' ' . esc_attr('aligncenter') . '"' : '"';

  $bquote  = '<div class="atheme-blockquote-wrap' . $image_center . '>';
  $bquote .= '<blockquote class="atheme-blockquote' . $class_attr . $type_class_attr . $style_attr . '>';
  $bquote .= $content . '<cite class="atheme-cite"' . $style_attr . '>' . esc_html($cite) . '</cite>' .
  '</blockquote>';

  if(!empty($image_src)) {
    $bquote .= '<img class="atheme-blockquote-image" src="' . esc_url($image_src) . '" alt="' . esc_attr($alt) . '" />';
  }
  $bquote .= '</div>';

  return $bquote;
}
