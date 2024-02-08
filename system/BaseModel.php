<?php namespace System;

use App\Config;
use App\Helpers\Database;

class BaseModel{
    protected $db;

    public function _construct() {
        $config = Config::get();

        $this->db = Database::get($config);
    }
}