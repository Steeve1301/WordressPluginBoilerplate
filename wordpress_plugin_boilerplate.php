<?php
namespace MyPlugin;
/*
 * Plugin Name: Wordpress Plugin Boilerplate
 * Description: Boilerplate for wordpress plugin
 * Author: Steeve Henrard
 */
use MyPlugin\Templates\PageTemplater;

if( ! defined( 'ABSPATH' ) ) {
    return;
}
require_once 'config/bootstrap.php';

class MyPlugin {
    public static $plugin_name;

    public function __construct() {
        self::$plugin_name = 'MyPlugin';
    }

    public function load() {
        require_once 'vendor/autoload.php';
        include_once 'includes/bf-functions.php';
        include_once 'routes/routes.php';
    }

    public function addMenuLink() {
        include_once 'config/menus.php';
    }

    public static function loadAssetsAdmin() {
        include_once 'config/assets_admin.php';
    }

    public static function loadAssetsFront() {
        include 'config/assets_front.php';
    }

    public static function getFilePath() {
        return __FILE__;
    }

    public static function migrate() {
        $files = array_slice(scandir(plugin_dir_path(MyPlugin::getFilePath()) . '/databases/Migrations'), 2);

        foreach($files as $file) {
            try {
                $class_name = 'MyPlugin\Databases\\' . str_replace('.php', '', $file);
                if(class_exists($class_name)) {
                    $class_name::up();
                }
            } catch(\Throwable $e) {
                error_log($e->getMessage());
            }
        }
    }

    public function change_title($title) {
        $this->title = $title;
    }

    public static function set_custom_title( $title ) {
        if($title['title'] == 'Formation Details') {
            $new_title = [
                'title' => Formation::find($_GET['id'])->title,
                'site' => get_bloginfo('name')
            ];
        } else {
            $new_title = [
                'title' => $title['title'],
                'tagline' => $title['tagline'],
                'site' => $title['site']
            ];
        }
        return $new_title;
    }
}

function load_plugin() {
    $plugin = new MyPlugin();
    $plugin->load();
}
add_action('plugins_loaded', 'MyPlugin\load_plugin');
register_activation_hook(__FILE__, [MyPlugin::class, 'migrate'] );
add_filter( 'document_title_parts', array(MyPlugin::class, 'set_custom_title'), 10 );
add_action( 'plugins_loaded', array( PageTemplater::class, 'get_instance' ) );
