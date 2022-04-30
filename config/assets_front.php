<?php
/*
 * Register assets and config variables
 */

use BeleadFormation\BeleadFormation;

wp_enqueue_style( 'main', plugin_dir_url(BeleadFormation::getFilePath()). 'public/css/style.css' );



