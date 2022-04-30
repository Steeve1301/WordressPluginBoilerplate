<?php

add_menu_page(
    'My Plugin',
    'My Plugin',
    'manage_options',
    'myplugin/index',
    [\MyPlugin\Controllers\MyPluginController::class, 'index']
);
