ArtisanCommands
===============

This repository should be a collection of usefull Laravel 4 Artisan commands. Feel free to contribute your own commands.

Installation
------
To install any of these, just copy the desired command to your app/commands folder and register the command in your
app/start/artisan.php file like so:

 ```php
 Artisan::add(new CustomCommand);
 ```

 Create your own
------
Please refer to the official docs if you like to create your own commands:
[Laravel 4 Documentation](http://four.laravel.com/docs/eloquent)
