# Plugin BoilerPlate for Wordpress - Made by Steeve Henrard

### Version
- 1.0

### Features
- Eloquent for db query and table creation
- MVC 
- Automatic templates detection and registration

### Installation
- Update the main file (wordpress_plugin_boilerplate.php) name to your plugin name .php
- Run composer install
- Run composer dump-autoload -o 
- Setup your database parameters in config > bootstrap.php

### How to

### Create your model
- Create them in app > Classes
- Extends Model.php (for Illuminate support)

#### Add tabs to backoffice menu
```
config > menus.php

Other files has to be placed in views > back directory.
```

#### Change the namespace
- You have to change the parent namespace
```
eg: BeleadFormation\Controllers to YourNameSpace\Controllers
Also to change in the composer.json
```

#### Add table
- Create class for migration
```
databases > Migrations > *
```
- Migration is automatic on plugin activation
#### Add a shortcode
- Write this in the following file (replace controller and method)
```
routes > routes.php

add_shortcode('name_of_the_shortcode', array(MyController::class, 'myMethod'));
```
- Write your shortcodes in shortcoldes folder

#### Create a new template page

- Go to views > front > and place your files 
- You can use sub-directory, fetching files is recursive

#### Helpers
- A directory Helpers is in app > Helpers
- Place here your classes for Helpers 
