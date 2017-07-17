<?php
function atheme_pricing_table($atts, $content = null) {
  extract(shortcode_atts(array(
    'columns' => '3',
  ), $atts));

  return '<div class="atheme-pricing-table ' . $columns . 'columns">' .
             do_shortcode($content) .
         '</div>';
}
add_shortcode('price-table', 'atheme_pricing_table');

function atheme_pricing_table_column($atts) {
  $a = shortcode_atts(array(
    'title' => 'Title',
  ), $atts);

  return '<div class="atheme-pricing-table ' . $a['columns'] . 'columns">' .
            $content .
         '</div>'
}
add_shortcode('price-table-column', 'atheme_pricing_table_column');
