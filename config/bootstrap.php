<?php
use BeleadFormation\BeleadFormation;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once plugin_dir_path(BeleadFormation::getFilePath()) . 'vendor/autoload.php';

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "database" => "database",
    "username" => "root",
    "password" => ""
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
