<?php

namespace App\Controllers;
use Core\BaseController;
use Core\DB;

class HomeController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM citation WHERE id = :id";
        $params = ['id' => 1];

        $result = DB::select($sql, $params);
        print_r($result);

        $this->view('home');
    }
}
