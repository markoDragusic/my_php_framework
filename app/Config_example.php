<?php namespace App;

/**
 * @author Marko Dragusic https://github.com/markoDragusic
 * A simple PHP framework base on instruction from the book 
 * "Beginning PHP: Master the latest features of PHP 7 and fully embrace modern PHP development" 
 * by David Carr and Markus Gray (published by Packt) 
 * 
 * Set your db data here and rename this file to Config.php
 */

class Config {

    public static function get()
    {
        return [
            //set the namespace for routing
            'namespace' => 'App\Controllers\\',

            //set default controller
            'default_controller' => 'Home',

            //set default method
            'default_method' => 'index',

            //database
            'db_type'     => 'mysql',
            'db_host'     => '127.0.0.1',
            'db_name'     => 'DB_NAME',
            'db_username' => 'DB_USER',
            'db_password' => 'DB_PASSWORD',
        ];
    }
}