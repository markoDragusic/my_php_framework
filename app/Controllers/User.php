<?php

namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\User as UserModel;
use Error;

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $users = UserModel::get_users();
        $title = 'Users';

        $this->view->render('/users/index', compact('users', 'title'));
    }

    public function register()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $username            = (isset($_POST['username']) ? $_POST['username'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);

            if (strlen($username) < 3) {
                $errors[] = 'Username is too short';
            } else {
                if ($username == UserModel::get_user_username($username)) {
                    $errors[] = 'Username address is already in use';
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email == UserModel::get_user_email($email)) {
                    $errors[] = 'Email address is already in use';
                }
            }

            if ($password != $password_confirm) {
                $errors[] = 'Passwords do not match';
            } elseif (strlen($password) < 3) {
                $errors[] = 'Password is too short';
            }

            if (count($errors) == 0) {

                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT)
                ];

                UserModel::insert($data);

                Session::set('success', 'User created');

                Url::redirect('/movies');
            }
        }

        $title = 'Add User';
        $this->view->render('/users/register', compact('errors', 'title'));
    }

    public function login()
    {
        if (Session::get('logged_in')) {
            Url::redirect('/movies');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if (password_verify($password, UserModel::get_hash($username)) == false) {
                $errors[] = 'Wrong username or password';
            }

            if (count($errors) == 0) {

                //logged in
                $data = UserModel::get_data($username);

                Session::set('logged_in', true);
                Session::set('user_id', $data->id);

                Url::redirect('/movies');
            }
            else {
                foreach ($errors as $e){
                    error_log($e);
                }
            }
        }

        $title = 'Login';

        $this->view->render('users/login', compact('title', 'errors'));
    }
}
