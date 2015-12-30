<?php

add_filter('embed_oembed_html', 'smamo_embed_oembed_html', 99, 4);
function smamo_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="video-wrap">' . $html . '</div>';
}
