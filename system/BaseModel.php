<?php namespace System;

use App\Config;
use App\Helpers\Database;

class BaseModel{
    protected static $db;

    public static function initDb() {
        $config = Config::get();
        self::$db = Database::get($config);
    }
}