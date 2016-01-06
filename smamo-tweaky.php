<?php

/*
Plugin name: Tweaky
Version: 1.0.0
Description: Tilføj special sauce tweaks til WP for bedre fundament
Author: SmartMonkey
Author URI: http://smartmonkey.dk
*/

$lib = plugin_dir_path( __FILE__ ) .'/libs/';

require_once $lib . 'clean-header.php';
require_once $lib . 'default-title.php';
require_once $lib . 'og-meta.php';
require_once $lib . 'upscale-img.php';
require_once $lib . 'video-wrap.php';
require_once $lib . 'admin-panel.php';
require_once $lib . 'svg-support.php';