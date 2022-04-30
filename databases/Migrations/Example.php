<?php
namespace MyPlugin\Databases;

use Illuminate\Database\Capsule\Manager as Capsule;
use MyPlugin\MyPlugin;

require plugin_dir_path(MyPlugin::getFilePath()) . "config/bootstrap.php";

class Example {
    public static function up() {
        if(!Capsule::schema()->hasTable('wp_example')) {
            Capsule::schema()->create('wp_example', function ($table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->timestamps();
            });
        }
    }
}

