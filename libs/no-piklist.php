<?php

function remove_piklist_menu($pages)
{
  foreach ($pages as $page => $value) // Loop through all admin pages registered with Piklist
  {
    if($value['menu_slug'] == 'piklist') // Check for the Piklist menu
    {
      unset($pages[$page]); // Remove it from the $pages array
    }
  }

  return $pages;
}
add_filter('piklist_admin_pages', 'remove_piklist_menu');

remove_action('wp_head', array('piklist_theme', 'version_in_header'));
remove_action('wp_footer', array('piklist_theme', 'piklist_love'), 1000);
