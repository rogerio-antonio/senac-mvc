<?php

class HomeController extends Controller
{


  private $data;

  public function __construct()
  {
    parent::__construct();

    $this->data = [];
  }

  private function loadDefaultData($title = "", $menu_active = "")
  {

    $this->data['title'] = $title;
    $this->data['menu_active'] = $menu_active;
  }

  public function index()
  {

    $this->loadTemplate("home", "home", $this->data);
  }

  

 
}
