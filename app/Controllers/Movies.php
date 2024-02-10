<?php

namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Movie;

class Movies extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        error_log('Session in movies' . Session::get('logged_in'));
        if (!Session::get('logged_in')) {
            Url::redirect('/user/login');
        }
    }

    public function index()
    {
        $movies = Movie::get_movies();
        $title = 'Movies';
        return $this->view->render('movies/index', compact('movies', 'title'));
    }

    public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $title  = (isset($_POST['title']) ? $_POST['title'] : null);
            $description   = (isset($_POST['description']) ? $_POST['description'] : null);

            if (strlen($title) < 2) {
                $errors[] = 'Title is too short';
            }

            if (count($errors) == 0) {

                $data = [
                    'title' => $title,
                    'description' => $description
                ];

                Movie::insert($data);

                Session::set('success', 'Movie created');

                Url::redirect('/movies');
            }
        }

        $this->view->render('/movies/add', compact('errors'));
    }

    public function delete($id)
    {
        if (!is_numeric($id)) {
            Url::redirect('/movies');
        }

        $movie = Movie::get_movie($id);

        if ($movie == null) {
            Url::redirect('/404');
        }

        $where = ['id' => $movie->id];

        Movie::delete($where);

        Session::set('success', 'Movies deleted');

        Url::redirect('/movies');
    }
}
