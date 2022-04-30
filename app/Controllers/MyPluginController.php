<?php
namespace MyPlugin\Controllers;

use MyPlugin\MyPlugin;

class MyPluginController {
    public function index() {
        include_once plugin_dir_path(MyPlugin::getFilePath()) . 'views/back/myplugin/index.php';
    }
}
