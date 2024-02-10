<?php

namespace App\Models;

use System\BaseModel;

class User extends BaseModel
{
    public static function get_hash($username)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        $data = self::$db->select('password FROM users WHERE username = :username', [':username' => $username]);
        return (isset($data[0]->password) ? $data[0]->password : null);
    }

    public static function get_data($username)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        $data = self::$db->select('* FROM users WHERE username = :username', [':username' => $username]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public static function get_users()
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        return self::$db->select('* from users order by username');
    }

    public static function get_user($id)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        $data = self::$db->select('* from users where id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public static function get_user_username($username)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }

        $data = self::$db->select('username from users where username = :username', [':username' => $username]);
        return (isset($data[0]->username) ? $data[0]->username : null);
    }

    public static function get_user_email($email)
    {
        if (!isset(self::$db)) {
            self::initDb();
        }
        
        $data = self::$db->select('email from users where email = :email', [':email' => $email]);
        return (isset($data[0]->email) ? $data[0]->email : null);
    }

    // public function get_user_reset_token($token)
    // {
    //     $data = $this->db->select('id from users where reset_token = :reset_token', [':reset_token' => $token]);
    //     return (isset($data[0]) ? $data[0] : null);
    // }

    public static function insert($data)
    {
        self::$db->insert('users', $data);
    }

    public function update($data, $where)
    {
        self::$db->update('users', $data, $where);
    }

    public function delete($where)
    {
        self::$db->delete('users', $where);
    }
}
