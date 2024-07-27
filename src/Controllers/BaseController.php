<?php

namespace App\Controller;
use App\Database\DatabaseQuery;

class BaseController{
  public $template;
  public $data = [];
  public $status = 200;
  public $response;

  public DatabaseQuery $dbQuery;

  public function __construct($action, $request, $response, $dbQuery){
    if (!method_exists($this, $action)){
      $this->template = "page404";
      $this->status = 404;
      return;
    }
    $this->dbQuery = $dbQuery;
    $this->$action($request);
    $this->makePage($response);
  }

  public function makePage($response){
    global $twig;
    $html = $twig->render($this->template.".twig", $this->data);
    $response->getBody()->write($html);
    $this->response  = $response;
  }
}