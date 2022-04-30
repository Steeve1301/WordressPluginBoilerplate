<?php
/*
 * Register assets and config variables
 */

use MyPlugin\MyPlugin;

wp_enqueue_style( 'main', plugin_dir_url(MyPlugin::getFilePath()). 'public/css/style.css' );



