<?php
namespace MyPlugin;

// Add menu to the panel

add_action( 'admin_menu', array($this, 'addMenuLink') );

// Load Assets
add_action( 'admin_enqueue_scripts', array(MyPlugin::class, 'loadAssetsAdmin'));
add_action('wp_enqueue_scripts', array(MyPlugin::class, 'loadAssetsFront'));

