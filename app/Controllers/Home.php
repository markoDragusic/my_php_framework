<?php

namespace App\Controllers;

use App\Helpers\Url;
use System\BaseController;

class Home extends BaseController {
    public function index(){
        Url::redirect('/user/login');
    }
}