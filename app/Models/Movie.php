<?php

namespace App\Models;

use System\BaseModel;

class Movie extends BaseModel
{
    public static function get_movies()
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        return self::$db->select('* FROM movies');
    }

    public static function get_movie($id)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        return self::$db->select('* FROM movies where id = :id', [':id' => $id])[0];
    }

    public static function insert($data)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        self::$db->insert('movies', $data);
    }

    public static function update($data)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        self::$db->update('movies', $data);
    }

    public static function delete($data)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }
        
        self::$db->delete('movies', $data);
    }
}
