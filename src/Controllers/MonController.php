<?php

namespace App\Controller;

use App\Controller\BaseController;

class MonController extends BaseController{
  public function index(){
    
    $sql = 'SELECT * FROM citation WHERE id = :id';
    $params = ['id' => 3];

    $result = $this->dbQuery->query($sql, $params);
    print_r($result);

    $this->template = "index";
  }
}